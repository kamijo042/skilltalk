<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\LectureCategories;

class InsertLectureCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        LectureCategories::create([
            'category_large_id' => 1,
            'category_small_id' => 1,
            'category_large_name' => 'IT',
            'category_small_name' => 'プログラミング',
        ]);
        LectureCategories::create([
            'category_large_id' => 1,
            'category_small_id' => 2,
            'category_large_name' => 'IT',
            'category_small_name' => 'IoT',
        ]);
        LectureCategories::create([
            'category_large_id' => 1,
            'category_small_id' => 3,
            'category_large_name' => 'IT',
            'category_small_name' => 'AI',
        ]);
        LectureCategories::create([
            'category_large_id' => 1,
            'category_small_id' => 4,
            'category_large_name' => 'IT',
            'category_small_name' => 'クラウド',
        ]);
        LectureCategories::create([
            'category_large_id' => 1,
            'category_small_id' => 5,
            'category_large_name' => 'IT',
            'category_small_name' => 'Fintech',
        ]);
        LectureCategories::create([
            'category_large_id' => 1,
            'category_small_id' => 6,
            'category_large_name' => 'IT',
            'category_small_name' => 'RPA',
        ]);
        LectureCategories::create([
            'category_large_id' => 1,
            'category_small_id' => 99,
            'category_large_name' => 'IT',
            'category_small_name' => 'その他',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        LectureCategories::all()->delete();
    }
}
