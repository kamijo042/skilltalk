<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableMessagesModifyColumnLectureBookId extends Migration
{
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->integer('lecture_book_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->integer('lecture_book_id')->change();
        });
    }
}
