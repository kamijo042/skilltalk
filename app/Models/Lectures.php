<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectures extends Model
{
    use HasFactory;

    protected $table = 'lectures';

    protected $fillable = [
        'id',
        'category_large_id',
        'category_small_id',
        'title',
        'sub_title',
        'expected_skill',
        'image_id',
        'unit_time',
        'unit',
        'price',
        'user_id',
        'venue',
        'is_online',
        'is_man_to_man',
        'initial_discount',
        'student_discount',
        'difficulty',
        'status',
        'created_at',
        'modified_at',
    ];

}
