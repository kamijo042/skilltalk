<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    public const IMAGE_TYPE = [
        1 => 'オフィス',
        2 => '海',
        3 => '山',
        4 => 'お金',
        5 => '森',
        6 => '花',
    ];

    protected $table = 'images';

    protected $fillable = [
        'id',
        'image_type',
        'image_name',
        'created_at',
        'modified_at',
    ];

}
