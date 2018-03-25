<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDjmixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('dj_mix')) {
            Schema::create('dj_mix', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->decimal('length');
                $table->string('dj');
                $table->string('music_path');
                $table->string('image_path');
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
        Schema::dropIfExists('dj_mix');
    }
}
