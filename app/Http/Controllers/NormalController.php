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

class NormalController extends Controller
{

    public function index()
    {
        $userRole = auth()->check() ? auth()->user()->role : 'guest';
        $categories = CategoryModel::all();
        $randomCourses = CoursesModel::where('course_visibility', 'true')->inRandomOrder()->limit(10)->get();
        return view('static.home', compact('categories', 'randomCourses', 'userRole'));
    }

    public function search_courses(Request $request)
    {
        $search = $request->get('search');

        $query = CoursesModel::query();

        if ($search) {
            $courses = $query->where('course_title', 'like', '%' . $search . '%')->get();
        } else {
            $courses = [];
        }

        $userRole = auth()->check() ? auth()->user()->role : 'guest';
        $categories = CategoryModel::all();

        return view('static.search_course', compact('categories', 'userRole', 'courses', 'search'));
    }

    public function shows_category($id)
    {
        $userRole = auth()->check() ? auth()->user()->role : 'guest';
        $categories = CategoryModel::all();

        $coursesQuery = CoursesModel::where('category_id', $id)
            ->where('course_visibility', 'true');

        if (request()->has('sort')) {
            if (request('sort') === 'newest') {
                $coursesQuery->orderBy('created_at', 'desc');
            } elseif (request('sort') === 'oldest') {
                $coursesQuery->orderBy('created_at', 'asc');
            } elseif (request('sort') === 'last_update') {
                $coursesQuery->orderBy('updated_at', 'desc');
            }
        }
        $courses = $coursesQuery->get();
        return view('static.category', compact('categories', 'courses', 'userRole'));
    }

    public function courses($id)
    {
        $userRole = auth()->check() ? auth()->user()->role : 'guest';
        $course = CoursesModel::findOrFail($id);
        $lessons = LessonsModel::where('course_id', $id)->get();
        $users = User::where('user_id', $id)->get();
        $categories = CategoryModel::all();
        $userEnrolled = EnrollModel::where('user_id', auth()->id())->where('course_id', $id)->exists();
        $userBankCost = $this->getUserBankCost(auth()->id());

        return view('static.course', compact('categories', 'course', 'lessons', 'userEnrolled', 'userBankCost', 'userRole'));
    }

    public function teacher_courses($userId = null)
    {
        $user = auth()->user();
        $userRole = $user ? $user->role : 'guest';
        
        $categories = CategoryModel::all();
        
        if ($userId) {
            $userteacher = User::with('courses')->findOrFail($userId);
            return view('static.teacher_courses', compact('categories', 'userteacher', 'userRole'));
        } else {
            $teachers = User::has('courses')->with('courses')->get();
            return view('static.teacher_courses', compact('categories', 'teachers', 'userRole'));
        }
    }
    
    
    
    public function buyCourse(Request $request)
    {
        // Get the course details
        $courseId = $request->input('course_id');
        $course = CoursesModel::findOrFail($courseId);
        $totalDiscountPrice = $request->input('total_discount_price'); // Get discounted price from form

        // Get the user's bank balance
        $userId = auth()->id();
        $userBank = BankModel::where('user_id', $userId)->firstOrFail();
        $userBankBalance = $userBank->balance;

        // Check if user has enough balance
        if ($userBankBalance < $totalDiscountPrice) {
            return back()->with('error', 'You don\'t have enough money to buy this course.');
        }

        // Deduct the course price from user's balance
        $userBank->balance -= $totalDiscountPrice;
        $userBank->save();

        // Add the course price to the course owner's balance
        $courseOwnerBank = BankModel::where('user_id', $course->user_id)->firstOrFail();
        $courseOwnerBank->balance += $totalDiscountPrice;
        $courseOwnerBank->save();

        // Insert into enrolls table
        $enroll = new EnrollModel();
        $enroll->user_id = $userId;
        $enroll->course_id = $courseId;
        $enroll->save();

        return redirect()->back()->with('success', 'Course bought successfully.');
    }

    // Profile

    public function shows_profile($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to view your profile.');
        }

        if ($id != auth()->id() && auth()->user()->role != 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $categories = CategoryModel::all();
        $user = User::findOrFail($id);
        $userBankCost = $this->getUserBankCost(auth()->id());
        $enrollments = EnrollModel::where('user_id', $id)->count();

        return view('static.profile.profile', compact('user', 'categories', 'enrollments', 'userBankCost'));
    }

    public function withdraw()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to view your profile.');
        }

        $categories = CategoryModel::all();

        return view('static.profile.withdraw', compact('categories'));
    }

    public function your_enrolls(Request $request, $id)
    {
        $categories = CategoryModel::all();
        $search = $request->get('search');

        // Query to fetch enrollments with course details
        $enrollmentsQuery = EnrollModel::select('tbl_courses.course_thumbnail', 'tbl_courses.course_title', 'tbl_enrolls.course_id')
            ->join('tbl_courses', 'tbl_enrolls.course_id', '=', 'tbl_courses.course_id')
            ->where('tbl_enrolls.user_id', $id);

        // Apply search filter if provided
        if ($search) {
            $enrollmentsQuery->where('tbl_courses.course_title', 'like', '%' . $search . '%');
        }

        // Retrieve enrollments and order by created_at descending
        $enrollments = $enrollmentsQuery->orderBy('tbl_enrolls.created_at', 'desc')->get();

        // Return view with enrollments, categories, and search keyword
        return view('static.profile.your_enrolls', compact('enrollments', 'categories', 'search'));
    }

    public function update_profile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            // 'password' => 'nullable|confirmed|min:6',
            'user_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for the photo
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        // Check if the password was provided
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        // Handle the file upload
        if ($request->hasFile('user_photo')) {
            $user_photo = $request->file('user_photo');
            $photoExtension = $user_photo->getClientOriginalExtension();
            $photoFileName = time() . '.' . $photoExtension;

            // Move the uploaded photo to the desired directory
            $user_photo->move(public_path('/upload'), $photoFileName);

            // Store the photo file name in the user's record
            $validatedData['user_photo'] = $photoFileName;
        }

        $user->update($validatedData);

        return redirect()->route('profile.show', $id)->with('success', 'Profile updated successfully');
    }

    // Bank

    public function getUserBankCost($user_id)
    {
        $bank = BankModel::where('user_id', $user_id)->first();
        return $bank ? $bank->balance : 0;
    }

    public function bank(Request $request)
    {
        $user = auth()->user();

        if (!$user instanceof User) {
            return redirect()->route('login')->with('error', 'User authentication failed.');
        }

        $bank = BankModel::where('user_id', $user->user_id)->first();

        if (!$bank) {
            return redirect()->back()->with('error', 'Bank information not found.');
        }

        $userBankCost = $bank->balance;

        $course = CoursesModel::find($request->course_id);
        $price = $course->course_price;
        $discount = $course->course_discount;

        $discountedAmount = $price - $price * ($discount / 100);

        $decimalPart = $discountedAmount - floor($discountedAmount);

        if ($decimalPart < 0.5) {
            $coursePrice = ceil($discountedAmount);
        } else {
            $coursePrice = floor($discountedAmount);
        }

        $enrollController = new EnrollController();

        if ($userBankCost >= $coursePrice) {
            $newBalance = $userBankCost - $coursePrice;
            $bank->balance = $newBalance;
            $bank->save();

            $enrollmentResult = $enrollController->join_lessons($request, $request->course_id);
            return redirect()->route('static.course', ['id' => $request->course_id])->with('success', 'You have successfully enrolled in the course!');
        } else {
            return redirect()->back()->withInput()->with('payment-error', 'Please top up your cost!');
        }
    }
}
