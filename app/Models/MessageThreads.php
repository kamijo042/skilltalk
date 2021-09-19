<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageThreads extends Model
{
    protected $table = 'message_threads';

    public const MESSAGE_THREAD_STATUS = [
        1 => '未受付',
        2 => '申込済',
        3 => '講義終了',
        4 => 'キャンセル',
    ];

    public const CONVERT_STATUS = [
        1 => 2,
        2 => 2,
        3 => 2,
        4 => 2,
        5 => 3,
        6 => 4,
    ];

    protected $fillable = [
        'id',
        'lecture_id',
        'lecture_book_id',
        'audience_user_id',
        'teacher_user_id',
        'entry_status',
        'last_updated',
        'created_at',
        'modified_at',
    ];

}
