<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stock;
//use DB;
use Carbon\Carbon;
class Producto extends model
{
    protected $table = 'productos';
	
	protected $fillable = ['nombre','precio','imagen'];
	
	public function stock()
    {
		//return DB::table('stocks')->where('id_producto',$this->id)->first();
		return $this->hasMany('App\Stock','id_producto','id')->first();
    }
	
	public function promociones()
	{
		return $this->belongsToMany('App\Promocion','promociones_productos','id_producto','id_promocion')
						->withPivot('fecha_inicio', 'fecha_fin')
						->orderBy('promociones_productos.fecha_fin', 'asc');
	}
	
	public function promocionesActuales()
	{
		return $this->belongsToMany('App\Promocion','promociones_productos','id_producto','id_promocion')
						->withPivot('fecha_inicio', 'fecha_fin')						
						->where('fecha_inicio', '<', \Carbon\Carbon::now())
						->where('fecha_fin', '>', \Carbon\Carbon::now())
						->orderBy('promociones_productos.fecha_fin', 'asc');
						
	}
	
	public function tienePromocion()
	{
		return !$this->promocionesActuales->isEmpty();
	}
	
	public function getDescuentoAttribute()
	{
		return (float) $this->attributes['precio'] * $this->promocionesActuales->first()->descuento / 100.00;
	}
	
	public function getPrecioPromocionalAttribute()
	{
		return (float)$this->attributes['precio'] - $this->Descuento;
	}
	
}
