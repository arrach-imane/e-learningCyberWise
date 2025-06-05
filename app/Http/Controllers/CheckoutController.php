<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoursesModel;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class CheckoutController extends Controller
{
    public function show(CoursesModel $course)
    {
        return view('checkout', compact('course'));
    }

    public function process(Request $request, CoursesModel $course)
    {
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
                    'unit_amount' => $course->course_price * 100,
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
        // Here you can enroll the user in the course using $request->course_id
        // and $request->user()
        // Example:
        // EnrollModel::firstOrCreate([
        //     'user_id' => $request->user()->user_id,
        //     'course_id' => $request->course_id,
        // ]);
        return view('checkout_success');
    }

    public function cancel()
    {
        return view('checkout_cancel');
    }
}
