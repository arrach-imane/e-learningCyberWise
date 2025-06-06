<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CoursesModel;

class EnrollModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_enrolls';

    protected $fillable = [
        'user_id',
        'course_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(CoursesModel::class, 'course_id', 'course_id');
    }
}
