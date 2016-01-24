<?php

use Illuminate\Database\Seeder;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('rols')->insert([
            'descripcion' => 'Usuario'
        ]);
		
        DB::table('rols')->insert([
            'descripcion' => 'Administrador'
        ]);		
    }
}
