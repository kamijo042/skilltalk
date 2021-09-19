<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'transactions';

    public const TRANSACTION_STATUS = [
        1 => '与信枠確保',
        2 => '売上確定',
        3 => '売上取消',
        4 => '入金待ち',
        5 => '入金済み',
    ];

    protected $fillable = [
        'id',
        'lecture_id',
        'user_id',
        'charge_id',
        'card_id',
        'coupon_id',
        'full_price',
        'discount_price',
        'fixed_price',
        'status',
        'created_at',
        'modified_at',
    ];

}
