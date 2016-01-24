<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('id_usuario');
            $table->dateTime('fecha_compra');
            $table->integer('total');            
            $table->timestamps();
        });

        Schema::create('ventas_cuerpo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cabecera');
            $table->integer('id_producto');
            $table->integer('cantidad');
            $table->decimal('precio_unitario');
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
        Schema::drop('ventas');
        Schema::drop('ventas_cuerpo');
    }
}
