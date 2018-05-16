<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('firstname');
                $table->string('lastname');
                $table->string('email')->unique();
                $table->string('phone')->unique();
                $table->string('password');
                $table->string('username');
                $table->string('image')->default(NULL);
                $table->text('status')->default(NULL);
                $table->string('languages')->default(NULL);
                $table->string('city')->default(NULL);
                $table->string('country')->default(NULL);
                $table->date('birthday')->default(NULL);
                $table->boolean('is_active')->default(1);
                $table->boolean('is_reported')->default(0);
                $table->boolean('is_blocked ')->default(0);
                $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
