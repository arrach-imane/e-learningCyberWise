<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function users_list()
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        // Get the authenticated user's role and ID
        $userRole = auth()->user()->role;
        $userId = auth()->id();

        // Initialize the query to fetch users
        $query = User::query();

        // Check if the authenticated user is an admin
        if ($userRole == 'admin') {
            // Fetch users and order them by user_id (adjust as per your sorting requirement)
            $users = $query->orderBy('user_id')->get();
        } else {
            // If the authenticated user is not an admin, abort with 403 Forbidden
            abort(403, 'Unauthorized action.');
        }

        // Return the view with the users data
        return view('admin.users.list', compact('users'));
    }

    public function user_delete(Request $request)
    {
        $adminController = new AdminController();
        return $adminController->deleteItems($request, 'user_id', User::class, 'User');
    }
}
