<?php

use Illuminate\Database\Seeder;

class PromocionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promociones')->insert([
            'descuento' => 10
        ]);
		
		DB::table('promociones')->insert([
            'descuento' => 20
        ]);
		
		DB::table('promociones')->insert([
            'descuento' => 30
        ]);
		
		DB::table('promociones')->insert([
            'descuento' => 40
        ]);
		
		DB::table('promociones')->insert([
            'descuento' => 50
        ]);
    }
}
