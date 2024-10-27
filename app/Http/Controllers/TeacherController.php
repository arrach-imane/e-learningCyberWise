<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\CoursesModel;
use App\Models\LessonsModel;
use App\Models\EnrollModel;
use App\Models\BankModel;
use App\Http\Controllers\EnrollController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    //teacher_dashboard
    public function teacher_showdashboard()
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

        // Fetch the courses data for the dashboard
        $coursesQuery = CoursesModel::select('tbl_courses.*', 'tbl_categories.category_title')
            ->join('tbl_categories', 'tbl_courses.category_id', '=', 'tbl_categories.category_id');

        // Fetch the lessons data for the dashboard
        $lessonsQuery = LessonsModel::select('tbl_lessons.*', 'tbl_courses.course_title')
            ->join('tbl_courses', 'tbl_lessons.course_id', '=', 'tbl_courses.course_id');

        // Adjust queries based on user role
        if ($userRole == 'admin') {
            $courses = $coursesQuery->orderBy('tbl_courses.user_id')->get();
            $lessons = $lessonsQuery->orderBy('tbl_courses.user_id')->get();
        } elseif ($userRole == 'teacher') {
            $courses = $coursesQuery->where('tbl_courses.user_id', $user_id)->orderBy('tbl_courses.user_id')->get();
            $lessons = $lessonsQuery->where('tbl_courses.user_id', $user_id)->orderBy('tbl_courses.user_id')->get();
        } else {
            abort(403, 'Unauthorized action.');
        }

        // Calculate totals
        $totalcourses = $courses->count();
        $totallessons = $lessons->count();

        // Fetch user bank cost using the method
        $userBankCost = $user->getUserBankCost(); // Ensure this call is correct and properly scoped

        // Return view based on user role
        if ($userRole == 'admin') {
            return view('admin.dashboard', compact('courses', 'lessons', 'totalcourses', 'totallessons'));
        } elseif ($userRole == 'teacher') {
            return view('teacher.dashboard', compact('courses', 'lessons', 'totalcourses', 'totallessons', 'userBankCost'));
        }
    }


    //teacher_course

    public function teacher_course_list()
    {
        $coursesController = new CoursesController();
        return $coursesController->course_list();
    }
    public function teacher_show_course_add()
    {
        $coursesController = new CoursesController();
        return $coursesController->show_course_add();
    }

    public function teacher_course_add(Request $request)
    {
        $coursesController = new CoursesController();
        return $coursesController->course_add($request);
    }

    public function teacher_show_course_update(Request $request, $id)
    {
        $coursesController = new CoursesController();
        return $coursesController->show_course_update($id);
    }
    public function teacher_course_update(Request $request, $id)
    {
        $coursesController = new CoursesController();
        return $coursesController->course_update($request, $id);
    }

    public function teacher_show_course_detail(Request $request, $id)
    {
        $coursesController = new CoursesController();
        return $coursesController->show_course_detail($id);
    }
    public function teacher_course_delete(Request $request)
    {
        $adminController = new AdminController();
        return $adminController->deleteItems($request, 'course_id', CoursesModel::class, 'Courses');
    }

    //teacher_lessons

    public function teacher_lessons_list()
    {
        $lessonsController = new LessonsController();
        return $lessonsController->lessons_list();
    }
    public function teacher_show_lessons_add()
    {
        $lessonsController = new LessonsController();
        return $lessonsController->show_lessons_add();
    }

    public function teacher_lessons_add(Request $request)
    {
        $lessonsController = new LessonsController();
        return $lessonsController->lessons_add($request);
    }

    public function teacher_show_lessons_update(Request $request, $id)
    {
        $lessonsController = new LessonsController();
        return $lessonsController->show_lessons_update($id);
    }
    public function teacher_lessons_update(Request $request, $id)
    {
        $lessonsController = new LessonsController();
        return $lessonsController->lessons_update($request, $id);
    }

    public function teacher_show_lessons_detail(Request $request, $id)
    {
        $lessonsController = new LessonsController();
        return $lessonsController->show_lessons_detail($id);
    }
    public function teacher_lessons_delete(Request $request)
    {
        $adminController = new AdminController();
        return $adminController->deleteItems($request, 'lesson_id', LessonsModel::class, 'Lessons');
    }
}
