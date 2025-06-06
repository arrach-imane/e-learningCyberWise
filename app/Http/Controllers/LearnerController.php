<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\CoursesModel;
use App\Models\LessonsModel;
use App\Models\EnrollModel;
use App\Models\BankModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LearnerController extends Controller
{
    public function dashboard()
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        // Get the authenticated user
        $user = auth()->user();

        // Get the user's role and ID
        $userRole = $user->role;
        $user_id = $user->user_id;

        // Fetch enrolled courses with their progress
        $enrolledCourses = EnrollModel::with('course')
            ->where('user_id', $user_id)
            ->get();

        // Calculate progress for each course
        $courseProgress = [];
        foreach ($enrolledCourses as $enrollment) {
            $course = $enrollment->course;
            $totalLessons = LessonsModel::where('course_id', $course->course_id)->count();
            $completedLessons = 0; // You can implement this based on your completion tracking logic

            $progress = $totalLessons > 0 ? ($completedLessons / $totalLessons) * 100 : 0;
            $courseProgress[$course->course_id] = [
                'progress' => $progress,
                'total_lessons' => $totalLessons,
                'completed_lessons' => $completedLessons
            ];
        }

        // Fetch all available courses
        $availableCourses = CoursesModel::with(['category', 'user'])
            ->where('course_visibility', 'true')
            ->orderBy('created_at', 'desc')
            ->get();

        // Get categories for navigation
        $categories = CategoryModel::all();

        return view('learner.dashboard', compact(
            'enrolledCourses',
            'courseProgress',
            'categories',
            'userRole',
            'availableCourses'
        ));
    }

    private function getUserBankCost($user_id)
    {
        $bank = BankModel::where('user_id', $user_id)->first();
        return $bank ? $bank->bank_cost : 0;
    }
}
