<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'id',
        'lecture_book_id',
        'message_thread_id',
        'audience_user_id',
        'teacher_user_id',
        'talk_user_id',
        'message',
        'toward',
        'dept',
        'created_at',
        'modified_at',
    ];

}
