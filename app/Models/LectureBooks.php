<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectureBooks extends Model
{
    protected $table = 'lecture_books';

    public const LECTURE_BOOK_STATUS = [
        1 => '日程調整',
        2 => 'オフライン会議',
        3 => 'WEB会議',
        4 => '会議室及びWEB会議',
        5 => '講義終了',
        6 => 'キャンセル',
    ];

    protected $fillable = [
        'id',
        'lecture_id',
        'user_id',
        'transaction_id',
        'status',
        'created_at',
        'modified_at',
    ];

}
