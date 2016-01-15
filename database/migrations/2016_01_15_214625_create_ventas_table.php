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
            $table->string('comprobante');
            $table->decimal('total_sin_iva');
            $table->decimal('iva');
            $table->decimal('total');
            $table->integer('id_usuario');
            $table->timestamps();
        });

        Schema::create('ventas_cuerpo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cabecera');
            $table->integer('id_producto');
            $table->decimal('cantidad');
            $table->decimal('precio_sin_iva');
            $table->decimal('iva');
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
