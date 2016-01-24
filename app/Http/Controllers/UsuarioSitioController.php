<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Usuario;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsuarioSitioController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');		
	}
	
	public function informacion()
    {
		if(Auth::user()->rol->permisos->contains(12))
		{
			$prmUsuario = Usuario::findOrFail(Auth::user()->id);
			return view('usuario.info',compact('prmUsuario'));
		}
		else
		{
			return abort(401);
		}
	}
}
