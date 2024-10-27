<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursesModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_courses';
    protected $primaryKey = 'course_id';
    protected $fillable = [
        'category_id', 'user_id', 'course_title', 'course_description',
        'course_requirements', 'course_price', 'course_discount',
        'course_thumbnail', 'course_video_url', 'course_visibility'
    ];

    public function getDiscountedPrice()
    {
        $price = $this->attributes['course_price'];
        $discount = $this->attributes['course_discount'];

        if (is_numeric($discount)) {
            $discountedAmount = $price - ($price * ($discount / 100));
            // Ensure the discounted price is rounded appropriately
            $totalDiscountPrice = $discountedAmount < 0.5 ? ceil($discountedAmount) : floor($discountedAmount);
        } else {
            // If discount is not numeric or null, handle accordingly (e.g., default to original price)
            $totalDiscountPrice = $price;
        }

        return $totalDiscountPrice;
    }
    public function lessons()
    {
        return $this->hasMany(LessonsModel::class, 'course_id', 'course_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
