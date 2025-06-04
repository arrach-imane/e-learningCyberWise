<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\CategoryModel;
use App\Models\BankModel;


class AuthController extends Controller
{
    public function showSignupForm()
    {
        $categories = CategoryModel::all();
        return view("auth.signup", compact('categories'));
    }

    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|max:255',
            'email' => 'required|email|unique:tbl_users',
            'password' => 'required|min:6|confirmed',
        ]);

        try {
            $user = User::create([
                'full_name' => $validatedData['full_name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            $bank = new BankModel();
            $bank->user_id = $user->user_id;
            $bank->save();

            Auth::login($user);
            return redirect(url(''))->with('success', 'Account successfully created.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred during registration. Please try again.']);
        }
    }
    public function showLoginForm()
    {
        $categories = CategoryModel::all();
        return view('auth.login', compact('categories'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'The provided email address was not found in our records.',
            ]);
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'The provided password is incorrect.',
            ]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirection basée sur le rôle
            switch ($user->role) {
                case 'admin':
                    return redirect()->intended('admin/dashboard');
                case 'teacher':
                    return redirect()->intended('teacher/dashboard');
                case 'learner':
                    return redirect()->intended('learner/dashboard');
                default:
                    return redirect()->intended('');
            }
        }

        return back()->withErrors([
            'email' => 'Authentication failed. Please try again.',
        ]);
    }

    public function forgotpassword()
    {
        $categories = CategoryModel::all();
        return view('auth.forgotpassword', compact('categories'));
    }
    public function postForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Generate a new remember_token
            $user->update(['remember_token' => Str::random(30)]);

            // Send reset password email
            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'Please check your email to reset your password.');
        } else {
            return redirect()->back()->with('error', 'Email not found.');
        }
    }
    public function reset($token)
    {
        $categories = CategoryModel::all();
        $user = User::where('remember_token', $token)->first();

        if ($user) {
            return view('teacher.auth.reset', compact('user', 'categories'));
        } else {
            abort(404);
        }
    }

    public function PostReset($token, Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        // Retrieve user by remember token
        $user = User::where('remember_token', $token)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid token or user not found');
        }

        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(30);
        $user->save();

        return redirect(url('login'))->with('success', 'Password reset successfully');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('');
    }

    //teacher
    public function teacher_showSignupForm()
    {
        $categories = CategoryModel::all();
        return view("teacher.auth.signup", compact('categories'));
    }
    public function teacher_signup(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|max:255',
            'email' => 'required|email|unique:tbl_users',
            'password' => 'required|min:6|confirmed',
        ]);

        try {
            $user = User::create([
                'full_name' => $validatedData['full_name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'role' => 'teacher',
            ]);


            $bank = new BankModel();
            $bank->user_id = $user->user_id;
            $bank->save();


            Auth::login($user);
            return redirect(url(''))->with('success', 'Account successfully created.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred during registration. Please try again.']);
        }
    }

    public function teacher_showLoginForm()
    {
        $categories = CategoryModel::all();
        return view('teacher.auth.login', compact('categories'));
    }

    public function teacher_login(Request $request)
    {
        // Validate request inputs
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if user with provided email exists
        $user = User::where('email', $credentials['email'])->first();

        // If user does not exist or is not a teacher, return with error
        if (!$user || $user->role !== 'teacher') {
            return back()->withErrors([
                'email' => 'The provided email address was not found in our records.',
            ]);
        }

        // Check if password matches
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'The provided password is incorrect.',
            ]);
        }

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('teacher/dashboard')->with('success', 'Login successfully.');
        }

        // If authentication fails for any other reason, return with error
        return back()->withErrors([
            'email' => 'Authentication failed. Please try again.',
        ]);
    }


    public function teacher_forgotpassword()
    {
        $categories = CategoryModel::all();
        return view('teacher.auth.forgotpassword', compact('categories'));
    }
    public function teacher_PostForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Generate a new remember_token
            $user->update(['remember_token' => Str::random(30)]);

            // Send reset password email
            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'Please check your email to reset your password.');
        } else {
            return redirect()->back()->with('error', 'Email not found.');
        }
    }
    public function teacher_reset($remember_token)
    {
        $categories = CategoryModel::all();
        $user = User::getTokenSingle($remember_token);
        if (!empty($user)) {
            $data['user'] = $user;
            return view('teacher.auth.reset', $data, compact('categories'));
        } else {
            abort(404);
        }
    }
    public function teacher_PostReset($token, Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('remember_token', $token)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid token or user not found');
        }

        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(30);
        $user->save();

        return redirect(url('teacher-login'))->with('success', 'Password reset successfully');
    }

    public function teacher_logout()
    {
        Auth::logout();
        return redirect('');
    }
}
