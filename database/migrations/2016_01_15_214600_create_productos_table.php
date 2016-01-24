<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->decimal('precio');
			$table->string('imagen');
            $table->timestamps();
        });
		
		Schema::create('promociones', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('descuento');
            $table->timestamps();
        });
		
		Schema::create('promociones_productos', function (Blueprint $table) {
            $table->integer('id_producto');
            $table->integer('id_promocion');
			$table->dateTime('fecha_inicio');
			$table->dateTime('fecha_fin');
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
        Schema::drop('productos');
		Schema::drop('promociones');
		Schema::drop('promociones_productos');
    }
}
