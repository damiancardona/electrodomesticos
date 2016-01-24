<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
	
	protected $fillable =['id_usuario','fecha_compra','total'];
	
	public function productosVenta()
    {
        return $this->hasMany('App\venta_cuerpo','id_cabecera');
    }
	
	public function Usuario()
	{
		return $this->hasMany('App\Usuario','id_usuario');
	}
}
