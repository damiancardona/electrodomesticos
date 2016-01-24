<?php

use Illuminate\Database\Seeder;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'email' => 'marco@yahoo.com.ar',
            'nombre' => 'Marco',
            'password' => bcrypt('123456'),
			'id_rol' => 1
        ]);
		
		DB::table('usuarios')->insert([
            'email' => 'jonir2007@yahoo',
            'nombre' => 'Joni',
            'password' => bcrypt('456789'),
			'id_rol' => 2
        ]);
    }
}
