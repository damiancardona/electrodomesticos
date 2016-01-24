<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class promocion extends Model
{
    protected $table = 'promociones';
	
	protected $fillable = ['descuento'];

	public function productos()
	{
		return $this->belongsToMany('App\Producto','promociones_productos','id_producto','id_promocion');
	}	
}
