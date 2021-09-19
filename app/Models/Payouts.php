<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payouts extends Model
{
    protected $table = 'payouts';

    public const TRANSACTION_STATUS = [
        1 => '入金待ち',
        2 => '入金済み',
    ];

    protected $fillable = [
        'id',
        'user_id',
        'payout',
        'transaction_fee',
        'system_fee',
        'apply_date',
        'payout_date',
        'status',
        'created_at',
        'modified_at',
    ];

}
