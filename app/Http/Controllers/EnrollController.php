<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\CoursesModel;
use App\Models\LessonsModel;
use App\Models\EnrollModel;
use App\Models\User;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
    public function join_lessons(Request $request, $id)
    {
        $existingEnrollment = EnrollModel::where('user_id', auth()->id())
            ->where('course_id', $id)
            ->first();

        if (!$existingEnrollment) {
            EnrollModel::create([
                'user_id' => auth()->id(),
                'course_id' => $id,
            ]);

            return redirect()->route('lessons', ['id' => $id])->with('success', 'You have successfully enrolled in the course!');
        }
        return redirect()->route('lessons', ['id' => $id]);
    }

    public function lessons($id)
    {
        $courses = CoursesModel::find($id);
        $lessons = LessonsModel::select('tbl_lessons.*', 'tbl_courses.course_title as course_title')
            ->join('tbl_courses', 'tbl_lessons.course_id', '=', 'tbl_courses.course_id')
            ->where('tbl_lessons.course_id', $id)
            ->orderBy('tbl_lessons.lesson_id')
            ->get();
        $categories = CategoryModel::all();

        $totalLessons = count($lessons);
        $completedLessons = 0;
        foreach ($lessons as $lesson) {
            if ($lesson->completed) {
                $completedLessons++;
            }
        }
        $competitionPercentage = $totalLessons > 0 ? ($completedLessons / $totalLessons) * 100 : 0;

        return view('static.lessons', compact('categories', 'courses', 'lessons', 'competitionPercentage', 'totalLessons'));
    }
}
