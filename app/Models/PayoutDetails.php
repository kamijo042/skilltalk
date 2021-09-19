<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayoutDetails extends Model
{
    protected $table = 'payout_details';

    protected $fillable = [
        'id',
        'payout_id',
        'transaction_id',
        'created_at',
        'modified_at',
    ];

}
