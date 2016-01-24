<?php

use Illuminate\Database\Seeder;

class PermisoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		/* ABM Usuario */
		/* 1 */
        DB::table('permisos')->insert([
            'descripcion' => 'Alta usuario'
        ]);
		/* 2 */
		DB::table('permisos')->insert([
            'descripcion' => 'Baja usuario'
        ]);
		/* 3 */
		DB::table('permisos')->insert([
            'descripcion' => 'Modificacion usuario'
        ]);
		/* 4 */
		DB::table('permisos')->insert([
            'descripcion' => 'Listar usuarios'
        ]);
		/* 5 */
		DB::table('permisos')->insert([
            'descripcion' => 'Ver usuario'
        ]);
		
		/* ABM Producto */
		/* 6 */
		DB::table('permisos')->insert([
            'descripcion' => 'Alta producto'
        ]);
		/* 7 */
		DB::table('permisos')->insert([
            'descripcion' => 'Baja producto'
        ]);
		/* 8 */
		DB::table('permisos')->insert([
            'descripcion' => 'Modificacion producto'
        ]);
		/* 9 */
		DB::table('permisos')->insert([
            'descripcion' => 'Listar productos'
        ]);
		/* 10 */
		DB::table('permisos')->insert([
            'descripcion' => 'Ver producto'
        ]);
		
		/* Panel Administracion */
		/* 11 */
		DB::table('permisos')->insert([
            'descripcion' => 'Ver panel de administracion'
        ]);
		
		/* Ver datos propios */
		/* 12 */
		DB::table('permisos')->insert([
            'descripcion' => 'Ver perfil'
        ]);
		
		/* Carrio */
		/* 13 */
		DB::table('permisos')->insert([
            'descripcion' => 'Ver carrio'
        ]);
		/* 14 */
		DB::table('permisos')->insert([
            'descripcion' => 'Alta producto carrito'
        ]);
		/* 15 */
		DB::table('permisos')->insert([
            'descripcion' => 'Baja producto carrito'
        ]);
		/* 16 */
		DB::table('permisos')->insert([
            'descripcion' => 'Cerrar carrito'
        ]);		
    }
}
