<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $table = 'coupons';

    public const DISCOUNT_TYPE = [
        1 => '定額割引',
        2 => '定率割引',
    ];

    public const STATUS = [
        1 => '有効',
        2 => '無効',
    ];

    protected $fillable = [
        'id',
        'lecture_id',
        'coupon_name',
        'coupon_code',
        'discount_type',
        'discount_price',
        'discount_rate',
        'max_issue_coupon',
        'coupon_from',
        'coupon_to',
        'status',
        'created_at',
        'modified_at',
    ];

}
