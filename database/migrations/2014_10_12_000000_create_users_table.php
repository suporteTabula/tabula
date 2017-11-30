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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->char('login', 45);
            $table->string('password');
            $table->char('email', 100)->unique();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('nickname', 100);
            $table->string('birthdate', 10);
            $table->string('sex', 45);
            $table->string('occupation', 100);
            $table->text('bio');
            $table->string('website', 100);
            $table->string('google_plus', 100);
            $table->string('twitter', 100);
            $table->string('facebook', 100);
            $table->string('youtube', 100);
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('schooling_id');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
