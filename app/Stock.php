<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Producto;
class Stock extends Model
{
    protected $table = 'stocks';
	
	protected $fillable = ['id_producto','cantidad'];
	
	public function Producto()
    {  
        return $this->belongsTo('App\Producto','id_producto','id');
    }
}
