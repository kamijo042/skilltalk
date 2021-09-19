<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccounts extends Model
{
    protected $table = 'bank_accounts';

    protected $fillable = [
        'id',
        'user_id',
        'bank_code',
        'bank_name',
        'account_type',
        'branch_code',
        'branch_name',
        'account_number',
        'account_name',
        'created_at',
        'modified_at',
    ];

}
