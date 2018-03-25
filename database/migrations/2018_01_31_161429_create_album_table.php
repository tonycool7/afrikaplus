<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('album')) {
            Schema::create('album', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->string('image_path');
                $table->string('artist');
                $table->timestamps();
                $table->engine = 'InnoDB';

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('album');
    }
}
