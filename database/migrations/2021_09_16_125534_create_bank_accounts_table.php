<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('bank_code')->nullable();
            $table->string('bank_name')->nullable();
            $table->integer('bank_account_type');
            $table->string('branch_code')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('account_number');
            $table->string('account_name')->nullable();
            $table->timestamps();
        });

        Schema::create('payouts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('payout');
            $table->integer('transaction_fee');
            $table->integer('system_fee');
            $table->datetime('apply_date');
            $table->datetime('payout_date');
            $table->integer('status');
            $table->timestamps();
        });

        Schema::create('payout_details', function (Blueprint $table) {
            $table->id();
            $table->integer('payout_id');
            $table->integer('transaction_id');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('bank_accounts');
        Schema::dropIfExists('payouts');
        Schema::dropIfExists('payout_detail');
    }
}
