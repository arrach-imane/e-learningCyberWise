<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoursesModel;
use App\Models\EnrollModel;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class CheckoutController extends Controller
{
    public function show(CoursesModel $course)
    {
        // Si le cours est gratuit, inscrire directement l'utilisateur
        if ($course->getDiscountedPrice() == 0) {
            $enroll = new EnrollModel();
            $enroll->user_id = Auth::id();
            $enroll->course_id = $course->course_id;
            $enroll->save();

            return redirect()->route('lessons', ['id' => $course->course_id])
                           ->with('success', 'You have successfully enrolled in the course!');
        }

        return view('checkout', compact('course'));
    }

    public function process(Request $request, CoursesModel $course)
    {
        // Si le cours est gratuit, rediriger vers la page des leçons
        if ($course->getDiscountedPrice() == 0) {
            return redirect()->route('lessons', ['id' => $course->course_id]);
        }

        Stripe::setApiKey(config('cashier.secret'));

        $user = Auth::user();

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'customer_email' => $user->email,
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $course->course_title,
                    ],
                    'unit_amount' => $course->getDiscountedPrice() * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => url('/checkout/success?session_id={CHECKOUT_SESSION_ID}&course_id=' . $course->course_id),
            'cancel_url' => url('/checkout/cancel'),
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $courseId = $request->query('course_id');
        $sessionId = $request->query('session_id');

        // Vérifier si l'utilisateur est déjà inscrit
        $existingEnrollment = EnrollModel::where('user_id', Auth::id())
            ->where('course_id', $courseId)
            ->first();

        if (!$existingEnrollment) {
            // Créer l'inscription
            $enroll = new EnrollModel();
            $enroll->user_id = Auth::id();
            $enroll->course_id = $courseId;
            $enroll->save();
        }

        return view('checkout_success');
    }

    public function cancel()
    {
        return view('checkout_cancel');
    }
}
