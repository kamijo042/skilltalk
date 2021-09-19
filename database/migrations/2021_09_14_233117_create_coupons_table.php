<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->integer('lecture_id');
            $table->string('coupon_name');
            $table->string('coupon_code');
            $table->integer('discount_type');
            $table->integer('discount_price')->nullable();
            $table->integer('discount_rate')->nullable();
            $table->integer('max_issue_coupon');
            $table->datetime('coupon_from');
            $table->datetime('coupon_to');
            $table->integer('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
