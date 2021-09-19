<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'reviews';

    protected $fillable = [
        'id',
        'user_id',
        'comment',
        'rank',
        'image_id',
        'lecture_id',
        'lecture_book_id',
    ];

}
