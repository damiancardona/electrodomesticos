<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permisos';
	
	protected $fillable = ['descripcion'];

	public function roles()
	{
		return $this->belongsToMany('App\Permiso','permisos_rol','id_rol','id_permiso');
	}
}
