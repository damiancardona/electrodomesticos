<?php

use Illuminate\Database\Seeder;

class Permiso_rolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		/* Administrador - ABM usuarios */
        DB::table('permisos_rol')->insert([
            'id_rol' => 2,
			'id_permiso' => 1 
        ]);		
		DB::table('permisos_rol')->insert([
            'id_rol' => 2,
			'id_permiso' => 2
        ]);		
		DB::table('permisos_rol')->insert([
            'id_rol' => 2,
			'id_permiso' => 3
        ]);		
		DB::table('permisos_rol')->insert([
            'id_rol' => 2,
			'id_permiso' => 4
        ]);		
		DB::table('permisos_rol')->insert([
            'id_rol' => 2,
			'id_permiso' => 5
        ]);
		
		/* Administrador - ABM Producto */
		DB::table('permisos_rol')->insert([
            'id_rol' => 2,
			'id_permiso' => 6 
        ]);		
		DB::table('permisos_rol')->insert([
            'id_rol' => 2,
			'id_permiso' => 7
        ]);		
		DB::table('permisos_rol')->insert([
            'id_rol' => 2,
			'id_permiso' => 8
        ]);		
		DB::table('permisos_rol')->insert([
            'id_rol' => 2,
			'id_permiso' => 9
        ]);		
		DB::table('permisos_rol')->insert([
            'id_rol' => 2,
			'id_permiso' => 10
        ]);
		
		/* Administrador - panel adeministracion */
		DB::table('permisos_rol')->insert([
            'id_rol' => 2,
			'id_permiso' => 11
        ]);
		
		/* Administrador - ver perfil */
		DB::table('permisos_rol')->insert([
            'id_rol' => 2,
			'id_permiso' => 12
        ]);
		
		/* Administrador - carrito */
		DB::table('permisos_rol')->insert([
            'id_rol' => 2,
			'id_permiso' => 13
        ]);
		
		DB::table('permisos_rol')->insert([
            'id_rol' => 2,
			'id_permiso' => 14
        ]);
		
		DB::table('permisos_rol')->insert([
            'id_rol' => 2,
			'id_permiso' => 15
        ]);
		
		DB::table('permisos_rol')->insert([
            'id_rol' => 2,
			'id_permiso' => 16
        ]);
		
		/**********************************************/
		
		/* Usuario - ver perfil */
		DB::table('permisos_rol')->insert([
            'id_rol' => 1,
			'id_permiso' => 12
        ]);
		
		/* Usuario - carrito */
		DB::table('permisos_rol')->insert([
            'id_rol' => 1,
			'id_permiso' => 13
        ]);
		
		DB::table('permisos_rol')->insert([
            'id_rol' => 1,
			'id_permiso' => 14
        ]);
		
		DB::table('permisos_rol')->insert([
            'id_rol' => 1,
			'id_permiso' => 15
        ]);
		
		DB::table('permisos_rol')->insert([
            'id_rol' => 1,
			'id_permiso' => 16
        ]);
    }
}
