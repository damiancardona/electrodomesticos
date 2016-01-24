<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsuarioTableSeeder::class);
		$this->call(RolTableSeeder::class);
		$this->call(PermisoTableSeeder::class);
		$this->call(Permiso_rolTableSeeder::class);
		
		$this->call(ProductosTableSeeder::class);
		$this->call(PromocionesTableSeeder::class);
		$this->call(Promociones_ProductosTableSeeder::class);		
		$this->call(StocksTableSeeder::class);		
    }
}
