<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->longtext('desc');
            $table->string('urn');
            $table->string('sub_type')->nullable();
            $table->integer('category_id_parent')->nullable();
            $table->integer('desktop_index')->nullable();
            $table->integer('mobile_index')->nullable();
            $table->string('desktop_hex_bg')->nullable();
            $table->string('mobile_hex_bg')->nullable();
            $table->string('hex_icon')->nullable();
            $table->string('hex_course_icon')->nullable();
            $table->string('course_color')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
