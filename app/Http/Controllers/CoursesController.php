<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\CoursesModel;
use App\Models\CategoryModel;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CoursesController extends Controller
{
    public function course_list()
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        $user = Auth::user();

        // Initialize the query to select courses and their category titles
        $query = CoursesModel::select('tbl_courses.*', 'tbl_categories.category_title as category_title')
            ->join('tbl_categories', 'tbl_courses.category_id', '=', 'tbl_categories.category_id');

        // Apply role-based conditions to the query
        if ($user->role == 'admin') {
            // Admin can see all courses
            $courses = $query->orderBy('tbl_courses.user_id')->get();
            return view('admin.courses.list', compact('courses'));
        } elseif ($user->role == 'teacher') {
            // Teachers can see only their own courses
            $courses = $query->where('tbl_courses.user_id', $user->user_id)->orderBy('tbl_courses.user_id')->get();
            return view('teacher.courses.list', compact('courses'));
        } else {
            // Unauthorized users should not reach this point due to previous check, but just in case
            abort(403, 'Unauthorized action.');
        }
    }


    public function show_course_add()
    {
        $userRole = auth()->user()->role;
        $categories = CategoryModel::all();

        if ($userRole == 'admin') {
            return view('admin.courses.add', compact('categories'));
        } elseif ($userRole == 'teacher') {
            return view('teacher.courses.add', compact('categories'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function course_add(Request $request)
    {
        $user = Auth::user();

        // Validate the request data
        $validatedData = $request->validate([
            'course_title' => 'required|max:255',
            'course_description' => 'required',
            'course_requirements' => 'required',
            'course_price' => 'required|numeric|max:10000',
            'course_discount' => 'nullable|numeric|between:0,100',
            'course_video_url' => 'required|url|unique:tbl_courses',
            'course_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'course_visibility' => 'required',
            'category_id' => 'required|exists:tbl_categories,category_id',
        ]);

        $validatedData['course_thumbnail'] = $this->uploadThumbnail($request);

        $validatedData['user_id'] = $user->user_id;

        $course = CoursesModel::create($validatedData);

        if ($user->role == 'admin') {
            return redirect('admin/courses')->with('success', 'Course added successfully!');
        } elseif ($user->role == 'teacher') {
            return redirect('teacher/courses')->with('success', 'Teacher added successfully!');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function show_course_update($id)
    {
        $userRole = auth()->user()->role;
        $categories = CategoryModel::all();
        $course = CoursesModel::findOrFail($id);
        if ($userRole == 'admin') {
            return view('admin.courses.update', compact('course', 'categories'));
        } elseif ($userRole == 'teacher' && $course->user_id == auth()->id()) {
            return view('teacher.courses.update', compact('course', 'categories'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function course_update(Request $request, $id)
    {
        $user = auth()->user();
        $userRole = $user->role;

        // Use findOrFail with your custom primary key column name (course_id)
        $course = CoursesModel::findOrFail($id);

        $validatedData = $request->validate([
            'course_title' => 'required|max:255',
            'course_description' => 'required',
            'course_requirements' => 'required',
            'course_price' => 'required|numeric|max:10000',
            'course_discount' => 'nullable|numeric|between:0,100',
            'course_video_url' => [
                'required',
                'url',
                Rule::unique('tbl_courses')->ignore($course->getKey(), $course->getKeyName()),
            ],
            'course_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'course_visibility' => 'required',
            'category_id' => 'required|exists:tbl_categories,category_id',
        ]);

        // Upload the course thumbnail if provided
        if ($request->hasFile('course_thumbnail')) {
            $validatedData['course_thumbnail'] = $this->uploadThumbnail($request, $course);
        } else {
            // Keep existing thumbnail if not updated
            $validatedData['course_thumbnail'] = $course->course_thumbnail;
        }

        // Update the course record in the database
        $course->update($validatedData);

        // Redirect based on user role
        if ($userRole == 'admin') {
            return redirect('admin/courses')->with('success', 'Course updated successfully!');
        } elseif ($userRole == 'teacher') {
            return redirect('teacher/courses')->with('success', 'Course updated successfully!');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    private function uploadThumbnail(Request $request, $course = null)
    {
        if ($request->hasFile('course_thumbnail')) {
            $file = $request->file('course_thumbnail');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = public_path('photos/courses/');
            $file->move($path, $filename);
            return $filename;
        }

        return $course ? $course->course_thumbnail : null;
    }

    public function show_course_detail($course_id)
    {
        // Ensure user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        $user = auth()->user();
        $userRole = $user->role;
        $userId = $user->user_id;

        // Fetch the course details
        $course = CoursesModel::findOrFail($course_id);

        // Check authorization based on user role
        if ($userRole == 'teacher' && $course->user_id != $userId) {
            abort(403, 'Unauthorized action.');
        }

        $categories = CategoryModel::all();

        // Render view based on user role
        if ($userRole == 'admin') {
            return view('admin.courses.detail', compact('course', 'categories'));
        } elseif ($userRole == 'teacher') {
            return view('teacher.courses.detail', compact('course', 'categories'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function course_delete(Request $request)
    {
        $adminController = new AdminController();
        return $adminController->deleteItems($request, 'course_id', CoursesModel::class, 'Courses');
    }
}
