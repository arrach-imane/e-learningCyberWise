<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NormalController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LearnerController;

//Normal
Route::get('/', [NormalController::class, 'index']);
Route::get('category/{id}', [NormalController::class, 'shows_category'])->name('category');
Route::get('/search_courses', [NormalController::class, 'search_courses'])->name('search_courses');
Route::get('profile/withdraw/', [NormalController::class, 'withdraw']);
Route::get('teacher_courses/{id?}', [NormalController::class, 'teacher_courses'])->name('teacher_courses');
Route::get('courses/{id}', [NormalController::class, 'courses'])->name('static.course');

//learner

Route::group(['middleware' => ['learner']], function () {
    Route::get('learner/dashboard', [LearnerController::class, 'dashboard'])->name('learner.dashboard');
    Route::post('bank', [NormalController::class, 'bank']);
    Route::post('buy-course', [NormalController::class, 'buyCourse'])->name('buy-course');
    Route::get('/lessons/{id}', [EnrollController::class, 'lessons'])->name('lessons');
    Route::post('/lessons/{id}', [EnrollController::class, 'join_lessons']);
    Route::get('profile/{id}', [NormalController::class, 'shows_profile'])->name('profile.show');
    Route::put('profile/{id}', [NormalController::class, 'update_profile'])->name('profile.update');
    Route::get('your-enrolls/{id}', [NormalController::class, 'your_enrolls'])->name('profile.enrolls');
});

// Routes d'authentification
Route::get('signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('signup', [AuthController::class, 'signup']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword'])->name('password.request');
Route::post('forgot-password', [AuthController::class, 'postForgotPassword'])->name('password.email');
Route::get('reset-password/{token}', [AuthController::class, 'reset'])->name('password.reset');
Route::post('reset-password/{token}', [AuthController::class, 'PostReset'])->name('password.update');

// Routes pour les enseignants
Route::get('teacher-signup', [AuthController::class, 'teacher_showSignupForm'])->name('teacher_signup');
Route::post('teacher-signup', [AuthController::class, 'teacher_signup']);
Route::get('teacher-login', [AuthController::class, 'teacher_showLoginForm'])->name('teacher_login');
Route::post('teacher-login', [AuthController::class, 'teacher_login']);
Route::get('teacher-logout', [AuthController::class, 'teacher_logout']);
Route::get('teacher-forgot-password', [AuthController::class, 'teacher_forgotpassword']);
Route::post('teacher-forgot-password', [AuthController::class, 'teacher_PostForgotPassword']);
Route::get('teacher-reset/{token}', [AuthController::class, 'teacher_reset']);
Route::post('teacher-reset/{token}', [AuthController::class, 'teacher_PostReset']);

Route::group(['middleware' => ['teacher']], function () {
    //teacher-dashboard
    Route::get('teacher/dashboard', [TeacherController::class, 'teacher_showdashboard']);
    Route::get('teacher/courses', [TeacherController::class, 'teacher_course_list']);
    Route::get('teacher/course-add', [TeacherController::class, 'teacher_show_course_add']);
    Route::post('teacher/course-add', [TeacherController::class, 'teacher_course_add'])->name('teacher.course_add');
    Route::get('teacher/course/update/{id}', [TeacherController::class, 'teacher_show_course_update'])->name('teacher.course.edit');
    Route::put('teacher/course/update/{id}', [TeacherController::class, 'teacher_course_update'])->name('teacher.course.update');
    Route::get('teacher/course/detail/{id}', [TeacherController::class, 'teacher_show_course_detail'])->name('teacher.course.detail');
    Route::delete('teacher/courses/delete', [TeacherController::class, 'teacher_course_delete'])->name('teacher.courses.delete');

    Route::get('teacher/lessons', [TeacherController::class, 'teacher_lessons_list']);
    Route::get('teacher/lessons-add', [TeacherController::class, 'teacher_show_lessons_add']);
    Route::post('teacher/lessons-add', [TeacherController::class, 'teacher_lessons_add'])->name('teacher.lessons_add');
    Route::get('teacher/lessons/update/{id}', [TeacherController::class, 'teacher_show_lessons_update'])->name('teacher.lessons.edit');
    Route::put('teacher/lessons/update/{id}', [TeacherController::class, 'teacher_lessons_update'])->name('teacher.lessons.update');
    Route::get('teacher/lessons/detail/{id}', [TeacherController::class, 'teacher_show_lessons_detail'])->name('teacher.lessons.detail');
    Route::delete('teacher/lessons/delete', [TeacherController::class, 'teacher_lessons_delete'])->name('teacher.lessons.delete');
});

//admin

Route::get('admin', [AdminController::class, 'AdminshowLoginForm'])->name('admin');
Route::post('/admin', [AdminController::class, 'Admin_login'])->name('admin.login');

Route::group(['middleware' => ['admin']], function () {
    Route::get('admin-logout', [AdminController::class, 'adminlogout']);

    //admin-dashboard
    Route::get('admin/dashboard', [AdminController::class, 'showdashboard'])->name('admin.dashboard');
    Route::get('admin/users', [UsersController::class, 'users_list']);
    Route::delete('admin/users/delete', [UsersController::class, 'user_delete'])->name('admin.user.delete');

    Route::get('admin/courses', [CoursesController::class, 'course_list']);
    Route::get('admin/course-add', [CoursesController::class, 'show_course_add']);
    Route::post('admin/course-add', [CoursesController::class, 'course_add'])->name('admin.course_add');
    Route::get('admin/course/update/{id}', [CoursesController::class, 'show_course_update'])->name('admin.course.edit');
    Route::put('admin/course/update/{id}', [CoursesController::class, 'course_update'])->name('admin.course.update');
    Route::get('admin/course/detail/{id}', [CoursesController::class, 'show_course_detail'])->name('admin.course.detail');
    Route::delete('admin/courses/delete', [CoursesController::class, 'course_delete'])->name('admin.courses.delete');

    Route::get('admin/lessons', [LessonsController::class, 'lessons_list']);
    Route::get('admin/lessons-add', [LessonsController::class, 'show_lessons_add']);
    Route::post('admin/lessons-add', [LessonsController::class, 'lessons_add'])->name('admin.lessons_add');
    Route::get('admin/lessons/update/{id}', [LessonsController::class, 'show_lessons_update'])->name('admin.lessons.edit');
    Route::put('admin/lessons/update/{id}', [LessonsController::class, 'lessons_update'])->name('admin.lessons.update');
    Route::get('admin/lessons/detail/{id}', [LessonsController::class, 'show_lessons_detail'])->name('admin.lessons.detail');
    Route::delete('admin/lessons/delete', [LessonsController::class, 'lessons_delete'])->name('admin.lessons.delete');
});
