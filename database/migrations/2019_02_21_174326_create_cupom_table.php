<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCupomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupoms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cod_cupom', 100);
            $table->string('tipo_cupom',100);
            $table->double('valor_cupom',10 , 2);
            $table->string('desc_cupom',100)->nullable();
            $table->integer('curso_id')->nullable();
            $table->integer('limite_cupom');
            $table->integer('user_id');
            $table->date('expira_cupom')->nullable();
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
        Schema::dropIfExists('cupoms');
    }
}
