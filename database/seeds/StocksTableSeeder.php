<?php

use Illuminate\Database\Seeder;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stocks')->insert([
            'id_producto' => 1,
			'cantidad' => 5,
        ]);
		
		DB::table('stocks')->insert([
            'id_producto' => 2,
			'cantidad' => 7,
        ]);
		
		DB::table('stocks')->insert([
            'id_producto' => 3,
			'cantidad' => 10,
        ]);
		
		DB::table('stocks')->insert([
            'id_producto' => 4,
			'cantidad' => 3,
        ]);
		
		DB::table('stocks')->insert([
            'id_producto' => 5,
			'cantidad' => 2,
        ]);
		
		DB::table('stocks')->insert([
            'id_producto' => 6,
			'cantidad' => 8,
        ]);
		
		DB::table('stocks')->insert([
            'id_producto' => 7,
			'cantidad' => 6,
        ]);
		
		DB::table('stocks')->insert([
            'id_producto' => 8,
			'cantidad' => 4,
        ]);
		
		DB::table('stocks')->insert([
            'id_producto' => 9,
			'cantidad' => 2,
        ]);
		
		DB::table('stocks')->insert([
            'id_producto' => 10,
			'cantidad' => 1,
        ]);
		
		DB::table('stocks')->insert([
            'id_producto' => 11,
			'cantidad' => 9,
        ]);
		
		DB::table('stocks')->insert([
            'id_producto' => 12,
			'cantidad' => 0,
        ]);
    }
}
