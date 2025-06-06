<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_certificates';

    protected $fillable = [
        'user_id',
        'course_id',
        'certificate_number',
        'issue_date',
        'status'
    ];

    protected $casts = [
        'issue_date' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(CoursesModel::class, 'course_id', 'course_id');
    }
}
