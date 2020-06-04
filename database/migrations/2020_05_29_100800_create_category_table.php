<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // unutk menjalankan funsgi ini ketikan php artisan migrate
        Schema::create('category', function (Blueprint $table) {
            $table->id(); //secara otomatis id dianggap sebagai promary key
            $table->string('name', 255);
            $table->string('slug', 255);
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
        //jika kita ketik php artisan migrate:rollback maka fungsi ini akan dijalanlkan
        Schema::dropIfExists('category');
    }
}
