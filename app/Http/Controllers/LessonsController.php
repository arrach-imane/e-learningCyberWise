<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LessonsModel;
use App\Models\CoursesModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class LessonsController extends Controller
{
    public function lessons_list()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        $userRole = Auth::user()->role;
        $userId = Auth::id();

        $query = LessonsModel::select('tbl_lessons.*', 'tbl_courses.course_title as course_title')
            ->join('tbl_courses', 'tbl_lessons.course_id', '=', 'tbl_courses.course_id');

        if ($userRole == 'admin') {
            $lessons = $query->orderBy('tbl_courses.user_id')->get();
        } elseif ($userRole == 'teacher') {
            $lessons = $query->where('tbl_courses.user_id', $userId)->orderBy('tbl_courses.user_id')->get();
        } else {
            abort(403, 'Unauthorized action.');
        }

        if ($userRole == 'admin') {
            return view('admin.lessons.list', compact('lessons'));
        } elseif ($userRole == 'teacher') {
            return view('teacher.lessons.list', compact('lessons'));
        }
    }

    // Show the form for creating a new lesson
    public function show_lessons_add()
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        // Get authenticated user details
        $userRole = Auth::user()->role;
        $userId = Auth::id();

        // Fetch courses based on user role
        if ($userRole == 'admin') {
            $courses = CoursesModel::all(); // Fetch all courses for admin
        } elseif ($userRole == 'teacher') {
            $courses = CoursesModel::where('user_id', $userId)->get(); // Fetch courses for the authenticated teacher
        } else {
            abort(403, 'Unauthorized action.');
        }

        // Return view based on user role
        $viewName = $userRole == 'admin' ? 'admin.lessons.add' : 'teacher.lessons.add';
        return view($viewName, compact('courses'));
    }
    public function show_lessons_detail($id)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        // Get authenticated user details
        $userRole = Auth::user()->role;
        $userId = Auth::id();

        // Fetch the lesson details by ID
        $lesson = LessonsModel::findOrFail($id);

        // Fetch courses based on user role
        if ($userRole == 'admin') {
            $courses = CoursesModel::all();
        } elseif ($userRole == 'teacher') {
            $courses = CoursesModel::where('user_id', $userId)->get();
        } else {
            abort(403, 'Unauthorized action.');
        }

        // Additional data specific to the view (if needed)
        $lessonsList = LessonsModel::where('course_id', $lesson->course_id)
            ->orderBy('created_at', 'asc')
            ->get();

        // Return view with necessary data based on user role
        if ($userRole == 'admin') {
            return view('admin.lessons.detail', compact('courses', 'lesson', 'lessonsList'));
        } elseif ($userRole == 'teacher' && $lesson->course->user_id == $userId) {
            return view('teacher.lessons.detail', compact('courses', 'lesson', 'lessonsList'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    // Store a newly created lesson in storage
    public function lessons_add(Request $request)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        // Get authenticated user details
        $user = Auth::user();
        $userRole = $user->role;

        // Validate incoming request data
        $validatedData = $request->validate([
            'lesson_title' => 'required|max:255',
            'lesson_duration' => 'required|numeric|min:0',
            'lesson_video' => 'required|url|unique:tbl_lessons,lesson_video',
            'course_id' => 'required|exists:tbl_courses,course_id',
        ]);

        // If user is a teacher, associate the lesson with their user_id
        if ($userRole == 'teacher') {
            $validatedData['user_id'] = $user->id; // Use 'id' instead of 'user_id'
        }

        // Create new lesson record
        LessonsModel::create($validatedData);

        // Redirect with success message based on user role
        if ($userRole == 'admin') {
            return redirect('admin/lessons')->with('success', 'Lesson added successfully!');
        } elseif ($userRole == 'teacher') {
            return redirect('teacher/lessons')->with('success', 'Lesson added successfully!');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    // Show the form for editing the specified lesson
    public function show_lessons_update($id)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        // Get authenticated user details
        $user = Auth::user();
        $userRole = $user->role;
        $userId = $user->user_id;

        // Fetch the lesson details by ID
        $lesson = LessonsModel::findOrFail($id);

        // Fetch all courses for the current user role
        if ($userRole == 'admin') {
            $courses = CoursesModel::all();
            $view = 'admin.lessons.update';
        } elseif ($userRole == 'teacher') {
            $courses = CoursesModel::where('user_id', $userId)->get();
            $view = 'teacher.lessons.update';
        } else {
            abort(403, 'Unauthorized action.');
        }

        // Return view with necessary data
        return view($view, compact('courses', 'lesson'));
    }


    // Update the specified lesson in storage
    public function lessons_update(Request $request, $id)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        // Get authenticated user details
        $user = Auth::user();
        $userRole = $user->role;
        $userId = $user->user_id;

        // Fetch the lesson details by ID
        $lesson = LessonsModel::findOrFail($id);

        // Validate incoming request data
        $validatedData = $request->validate([
            'lesson_title' => 'required|max:255',
            'lesson_duration' => 'required|numeric|min:0',
            'course_id' => 'required|exists:tbl_courses,course_id',
            'lesson_video' => [
                'required',
                'url',
                Rule::unique('tbl_lessons')->ignore($lesson->getKey(), $lesson->getKeyName()),
            ],
        ]);

        // Update the lesson with validated data
        $lesson->update($validatedData);

        // Redirect with success message based on user role
        if ($userRole == 'admin') {
            return redirect('admin/lessons')->with('success', 'Lesson updated successfully!');
        } elseif ($userRole == 'teacher') {
            return redirect('teacher/lessons')->with('success', 'Lesson updated successfully!');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function lessons_delete(Request $request)
    {
        $adminController = new AdminController();
        return $adminController->deleteItems($request, 'lesson_id', LessonsModel::class, 'Lessons');
    }
}
