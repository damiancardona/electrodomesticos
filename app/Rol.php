<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;

class Rol extends Model
{
    protected $table = 'rols';
	
	protected $fillable = ['descripcion'];
	
	public function usuarios()
    {
        return $this->hasMany('App\Usuario','id_rol');
    }
	
	public function permisos()
	{
		return $this->belongsToMany('App\Permiso','permisos_rol','id_rol','id_permiso');
	}
}
