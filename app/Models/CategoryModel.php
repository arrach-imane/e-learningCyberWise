<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_categories';
    protected $primaryKey = 'category_id';

    protected $fillable = ['category_title'];
    public function courses()
    {
        return $this->hasMany(CoursesModel::class, 'category_id');
    }
}
