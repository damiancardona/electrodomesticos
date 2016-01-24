<?php

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'nombre' => 'Televisor',
			'precio' => 25000,
			'imagen' => 'img/producto/3830bf15a3270274304b07e1c301c7b3.jpg',
        ]);
		
		DB::table('productos')->insert([
            'nombre' => 'Heladera',
			'precio' => 4000,
			'imagen' => 'img/producto/7b77d8293908b5726d594ddda6950879.jpg',
        ]);
		
		DB::table('productos')->insert([
            'nombre' => 'Microondas',
			'precio' => 3250,
			'imagen' => 'img/producto/a1d22aae644289629e1bc86d52ce7600.jpg',
        ]);
		
		DB::table('productos')->insert([
            'nombre' => 'Tablet',
			'precio' => 7123,
			'imagen' => 'img/producto/c4e0ba5422383082417c5f96ab121575.jpg',
        ]);
		
		DB::table('productos')->insert([
            'nombre' => 'Balanza personal',
			'precio' => 350.20,
			'imagen' => 'img/producto/547da52a8a1fd85fe4d2e8925febfc2c.jpg',
        ]);
		
		DB::table('productos')->insert([
            'nombre' => 'Notebook',
			'precio' => 5000.00,
			'imagen' => 'img/producto/2c04733366248316e0d5ea795b29d5a8.jpg',
        ]);
		
		DB::table('productos')->insert([
            'nombre' => 'Cocina',
			'precio' => 6524.50,
			'imagen' => 'img/producto/99281303f6eab9edf2ec9f7ffde1bbaa.jpg',
        ]);
		
		DB::table('productos')->insert([
            'nombre' => 'Bicicleta',
			'precio' => 2531.99,
			'imagen' => 'img/producto/6ff570daea236e56ff32733b8948a458.jpg',
        ]);
		
		DB::table('productos')->insert([
            'nombre' => 'GPS',
			'precio' => 1999.00,
			'imagen' => 'img/producto/11648e4e66e7ed6a86cb7f1d0cf604fe.jpg',
        ]);
		
		DB::table('productos')->insert([
            'nombre' => 'Aspiradora',
			'precio' => 2333.29,
			'imagen' => 'img/producto/10c25193e482e482ec603ac2e510a4fb.JPG',
        ]);
		
		DB::table('productos')->insert([
            'nombre' => 'Planchita para el pelo',
			'precio' => 1036.30,
			'imagen' => 'img/producto/1a483b559b0465020aacbabe228c05a9.jpg',
        ]);
		
		DB::table('productos')->insert([
            'nombre' => 'Afeitadora',
			'precio' => 1500.09,
			'imagen' => 'img/producto/7e40248fdd662b49b4328f561d6a1127.jpg',
        ]);
    }
}
