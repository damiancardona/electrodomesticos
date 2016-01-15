<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carritos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario');
            $table->string('session_hash');
            $table->timestamps();
        });

        Schema::create('carritos_cuerpo', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('canntidad');
            $table->integer('id_cabecera');
            $table->integer('id_producto');
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
        Schema::drop('carritos');
    }
}
