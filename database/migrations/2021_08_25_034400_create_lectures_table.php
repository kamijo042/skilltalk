<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->integer('category_large_id');
            $table->integer('category_small_id');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('expected_skill');
            $table->integer('image_id');
            $table->integer('unit_time');
            $table->string('unit');
            $table->integer('price');
            $table->integer('user_id');
            $table->string('venue')->nullable();
            $table->boolean('is_online');
            $table->boolean('is_man_to_man');
            $table->boolean('initial_discount');
            $table->boolean('student_discount');
            $table->integer('difficulty');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lectures');
    }
}
