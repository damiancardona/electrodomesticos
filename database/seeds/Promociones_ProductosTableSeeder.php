<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Promociones_ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promociones_productos')->insert([
            'id_producto' => 1,
			'id_promocion' => 2,
			'fecha_inicio' => Carbon::create(2016,01,01, 00,00,00)->toDateTimeString(),
			'fecha_fin' => Carbon::create(2016,01,31,23,59,59)->toDateTimeString(),
        ]);
		
		DB::table('promociones_productos')->insert([
            'id_producto' => 4,
			'id_promocion' => 4,
			'fecha_inicio' => Carbon::create(2016,02,01,00,00,00)->toDateTimeString(),
			'fecha_fin' => Carbon::create(2016,02,29,23,59,59)->toDateTimeString(),
        ]);
		
		DB::table('promociones_productos')->insert([
            'id_producto' => 1,
			'id_promocion' => 4,
			'fecha_inicio' => Carbon::create(2015,11,01,00,00,00)->toDateTimeString(),
			'fecha_fin' => Carbon::create(2015,11,30,23,59,59)->toDateTimeString(),
        ]);
    }
}
