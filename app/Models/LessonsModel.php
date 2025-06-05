<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LessonsModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_lessons';

    // Specify the primary key if it's different from 'id'
    protected $primaryKey = 'lesson_id';

    // Allow mass assignment for these fields
    protected $fillable = [
        'course_id', 'lesson_title', 'lesson_duration', 'lesson_video', 'lesson_content'
    ];

    // Define relationships if any
    public function course()
    {
        return $this->belongsTo(CoursesModel::class, 'course_id', 'course_id');
    }
}
