<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectureFavorits extends Model
{
    protected $table = 'lecture_favorits';

    protected $fillable = [
        'id',
        'lecture_id',
        'user_id',
        'created_at',
        'modified_at',
    ];

}
