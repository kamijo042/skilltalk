<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableMessageThreadsModifyColumnLecttureId extends Migration
{
    public function up()
    {
        Schema::table('message_threads', function (Blueprint $table) {
            $table->integer('lecture_id')->nullable()->change();
            $table->integer('lecture_book_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('message_threads', function (Blueprint $table) {
            $table->integer('lecture_id')->change();
            $table->integer('lecture_book_id')->change();
        });
    }
}
