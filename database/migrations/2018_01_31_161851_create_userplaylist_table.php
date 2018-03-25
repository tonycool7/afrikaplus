<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserplaylistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user_playlist')) {
            Schema::create('user_playlist', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('music_id')->unsigned();
                $table->integer('playlist_id')->unsigned();
                $table->timestamps();
                $table->engine = 'InnoDB';

            });

            Schema::table('user_playlist', function (Blueprint $table) {
                $table->foreign('playlist_id')->references('id')->on('playlist')
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
        Schema::dropIfExists('user_playlist');
    }
}
