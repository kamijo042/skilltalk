<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectureCategories extends Model
{
    use HasFactory;

    protected $table = 'lecture_categories';

    protected $fillable = [
        'id',
        'category_large_id',
        'category_small_id',
        'category_large_name',
        'category_small_name',
    ];

}
