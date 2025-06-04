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
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        $user = auth()->user();
        $userRole = $user->role;
        $userId = $user->user_id;

        // Get enrolled courses
        $enrolledCourses = EnrollModel::where('user_id', $userId)
            ->with(['course' => function($query) {
                $query->with('lessons');
            }])
            ->get();

        // Get course progress
        $courseProgress = [];
        foreach ($enrolledCourses as $enrollment) {
            $course = $enrollment->course;
            $totalLessons = $course->lessons->count();
            $completedLessons = $course->lessons->where('completed', true)->count();
            $progress = $totalLessons > 0 ? ($completedLessons / $totalLessons) * 100 : 0;

            $courseProgress[$course->course_id] = [
                'progress' => $progress,
                'total_lessons' => $totalLessons,
                'completed_lessons' => $completedLessons
            ];
        }

        // Get user's bank balance
        $userBankCost = $this->getUserBankCost($userId);

        // Get categories for navigation
        $categories = CategoryModel::all();

        return view('learner.dashboard', compact(
            'enrolledCourses',
            'courseProgress',
            'userBankCost',
            'categories',
            'userRole'
        ));
    }

    private function getUserBankCost($user_id)
    {
        $bank = BankModel::where('user_id', $user_id)->first();
        return $bank ? $bank->balance : 0;
    }
}
