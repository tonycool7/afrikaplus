<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('music')) {
            Schema::create('music', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->integer('album_id')->unsigned();
                $table->string('artist')->default(NULL);
                $table->string('length');
                $table->string('music_path');
                $table->string('image_path')->default(NULL);
                $table->string('uploaded_by')->default('admin');
                $table->timestamps();
                $table->engine = 'InnoDB';

            });

            Schema::table('music', function (Blueprint $table) {
                $table->foreign('album_id')->references('id')->on('album')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('music');
    }
}
