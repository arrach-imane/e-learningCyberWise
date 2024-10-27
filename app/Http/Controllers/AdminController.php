<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CoursesModel;
use App\Models\LessonsModel;
use App\Models\CategoryModel;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    //admin
    public function AdminshowLoginForm()
    {
        return view('admin.auth.admin_login');
    }

    public function Admin_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || $user->role !== 'admin') {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->withInput($request->only('email'));
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'The provided password is incorrect.',
            ])->withInput($request->only('email'));
        }

        Auth::login($user);

        return redirect()->intended(route('admin.dashboard'));
    }


    public function showdashboard()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }
        $userRole = auth()->user()->role;
        $userId = auth()->id();

        $totalcourses = CoursesModel::count();
        $totallessons = LessonsModel::count();
        $totalusers = User::count();
        $totalcategory = CategoryModel::count();

        if ($userRole == 'admin') {
            return view('admin.dashboard', compact('totalcourses', 'totallessons', 'totalusers', 'totalcategory'));
        } elseif ($userRole == 'teacher') {
            return view('teacher.dashboard', compact('totalcourses', 'totallessons', 'totalusers', 'totalcategory'));
        }
        return view('admin.dashboard');
    }

    public function deleteItems(Request $request, $column, $model, $itemType)
    {
        try {
            $ids = $request->input('ids');

            if (is_array($ids) && !empty($ids)) {
                $model::whereIn($column, $ids)->delete();
                return redirect()->back()->with('success', "{$itemType} deleted successfully.");
            } else {
                return redirect()->back()->with('error', "No {$itemType} selected for deletion.");
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Failed to delete {$itemType}.");
        }
    }
}
