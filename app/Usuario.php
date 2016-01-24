<?php

namespace App;

use Illuminate\Foundation\Auth\User;

use Illuminate\Database\Eloquent\Model;
use App\Rol;

class Usuario extends User /*Model*/
{
	protected $table = 'usuarios';
	
	protected $fillable = ['email','nombre','password','id_rol'];	
	
	public function rol()
    {  
        return $this->belongsTo('App\Rol','id_rol');
    }    
	
	public function Ventas()
	{
		return $this->belongsTo('App\Venta','id');
	}
}
