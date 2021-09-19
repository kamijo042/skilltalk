<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('lecture_id');
            $table->integer('user_id');
            $table->string('charge_id');
            $table->string('card_id');
            $table->integer('coupon_id')->nullable();
            $table->integer('full_price');
            $table->integer('discount_price')->nullable();
            $table->integer('fixed_price');
            $table->integer('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
