<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Images;

class InsertImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Images::create([
            'image_type' => 1,
            'image_name' => 'office01.jpg'
        ]);
        Images::create([
            'image_type' => 1,
            'image_name' => 'office02.jpg'
        ]);
        Images::create([
            'image_type' => 1,
            'image_name' => 'office03.jpg'
        ]);
        Images::create([
            'image_type' => 1,
            'image_name' => 'office04.jpg'
        ]);
        Images::create([
            'image_type' => 1,
            'image_name' => 'office05.jpg'
        ]);
        Images::create([
            'image_type' => 2,
            'image_name' => 'sea01.jpg'
        ]);
        Images::create([
            'image_type' => 2,
            'image_name' => 'sea02.jpg'
        ]);
        Images::create([
            'image_type' => 2,
            'image_name' => 'sea03.jpg'
        ]);
        Images::create([
            'image_type' => 2,
            'image_name' => 'sea04.jpg'
        ]);
        Images::create([
            'image_type' => 2,
            'image_name' => 'sea05.jpg'
        ]);
        Images::create([
            'image_type' => 3,
            'image_name' => 'mountains01.jpg'
        ]);
        Images::create([
            'image_type' => 3,
            'image_name' => 'mountains02.jpg'
        ]);
        Images::create([
            'image_type' => 3,
            'image_name' => 'mountains03.jpg'
        ]);
        Images::create([
            'image_type' => 3,
            'image_name' => 'mountains04.jpg'
        ]);
        Images::create([
            'image_type' => 3,
            'image_name' => 'mountains05.jpg'
        ]);
        Images::create([
            'image_type' => 4,
            'image_name' => 'money01.jpg'
        ]);
        Images::create([
            'image_type' => 4,
            'image_name' => 'money02.jpg'
        ]);
        Images::create([
            'image_type' => 4,
            'image_name' => 'money03.jpg'
        ]);
        Images::create([
            'image_type' => 4,
            'image_name' => 'money04.jpg'
        ]);
        Images::create([
            'image_type' => 4,
            'image_name' => 'money05.jpg'
        ]);
        Images::create([
            'image_type' => 5,
            'image_name' => 'forest01.jpg'
        ]);
        Images::create([
            'image_type' => 5,
            'image_name' => 'forest02.jpg'
        ]);
        Images::create([
            'image_type' => 5,
            'image_name' => 'forest03.jpg'
        ]);
        Images::create([
            'image_type' => 5,
            'image_name' => 'forest04.jpg'
        ]);
        Images::create([
            'image_type' => 5,
            'image_name' => 'forest05.jpg'
        ]);
        Images::create([
            'image_type' => 6,
            'image_name' => 'flower01.jpg'
        ]);
        Images::create([
            'image_type' => 6,
            'image_name' => 'flower02.jpg'
        ]);
        Images::create([
            'image_type' => 6,
            'image_name' => 'flower03.jpg'
        ]);
        Images::create([
            'image_type' => 6,
            'image_name' => 'flower04.jpg'
        ]);
        Images::create([
            'image_type' => 6,
            'image_name' => 'flower05.jpg'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
