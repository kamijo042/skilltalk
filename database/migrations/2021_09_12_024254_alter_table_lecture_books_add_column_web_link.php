<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableLectureBooksAddColumnWebLink extends Migration
{
    public function up()
    {
        Schema::table('lecture_books', function (Blueprint $table) {
            $table->string('lecture_web_link')->nullable();
            $table->string('lecture_place')->nullable();
            $table->datetime('lecture_datetime')->nullable();
        });
    }

    public function down()
    {
        Schema::table('lectures', function (Blueprint $table) {
            $table->dropColumn('lecture_web_link')->nullable();
            $table->dropColumn('lecture_place')->nullable();
            $table->dropColumn('lecture_datetime')->nullable();
        });

    }

}
