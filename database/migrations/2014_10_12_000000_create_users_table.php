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
            $table->string('avatar')->default('default.png');
            $table->string('group')->nullable();
            $table->char('email', 100)->unique();
            $table->string('name', 100);
            $table->string('cpf', 100)->nullable();
            $table->string('birthdate', 10)->nullable();
            $table->string('sex', 45)->nullable();
            $table->string('occupation', 100)->nullable();
            $table->string('interest')->nullable();
            $table->text('bio')->nullable();
            $table->string('website', 100)->nullable();
            $table->string('google_plus', 100)->nullable();
            $table->string('twitter', 100)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('youtube', 100)->nullable();
            $table->integer('country_id');
            $table->integer('state_id')->nullable();
            $table->string('address', 100)->nullable();
            $table->integer('number')->nullable();     
            $table->string('city', 100)->nullable();
            $table->string('cep', 100)->nullable();
            $table->integer('schooling_id')->nullable();
            $table->string('img_avatar')->nullable();
            $table->integer('empresa_id')->nullable();
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
