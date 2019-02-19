<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->double('price');
            $table->string('group')->nullable();
            $table->longtext('desc');
            $table->integer('user_id_owner');
            $table->integer('category_id');
            $table->string('requirements')->nullable();
            $table->string('video')->nullable();
            $table->integer('featured')->default(0);
            $table->string('thumb_img')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
