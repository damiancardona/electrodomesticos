<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class venta_cuerpo extends Model
{
    protected $table = 'ventas_cuerpo';
	
	protected $fillable =['id_cabecera','id_producto','cantidad','precio_unitario'];
	
	public function ventaCabezera()
    {
        return $this->belongsTo('App\Venta','id_cabecera');
    }
}
