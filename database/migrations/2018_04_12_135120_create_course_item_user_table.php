<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseItemUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_item_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('course_item_id');
            $table->longtext('desc')->nullable();
            $table->integer('course_item_status_id');
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
        Schema::dropIfExists('course_item_user');
    }
}
