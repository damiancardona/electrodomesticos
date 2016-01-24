<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Usuario;
use App\Rol;

use Session;

class UsuarioABMController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		if(Auth::user()->rol->permisos->contains(4))
		{
			$prmUsuario = Usuario::paginate(5);		
			return view('admin.usuario.index',compact('prmUsuario'));
		}
		else
		{
			return abort(401);
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		if(Auth::user()->rol->permisos->contains(1))
		{	
			$prmRol = Rol::All();
			return view('admin.usuario.create',compact('prmRol'));
		}
		else
		{
			return abort(401);
		}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		if(Auth::user()->rol->permisos->contains(1))
		{
			$validator = $this->validate($request, [
				'nombre' => 'required|min:3|max:20',
				'email' => 'required|Between:3,64|Email|Unique:usuarios',			
				'password' => 'required|min:3|confirmed',
				'password_confirmation' => 'required|min:3',
				'id_rol' => 'required|integer'
			]);		
		
			$input = $request->all();
		
			$nUsuario = Usuario::create($input);
			$nUsuario->password = bcrypt($input['password']);
		
			$nUsuario->save();		
		
			Session::flash('mensaje', 'Nuevo Usuario guardado!!!');
		
			return redirect()->route('admin.usuario.index');
		}
		else
		{
			return abort(401);
		}
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		if(Auth::user()->rol->permisos->contains(5))
		{
			$prmUsuario = Usuario::findOrFail($id);		
			return view('admin.usuario.show',compact('prmUsuario'));
		}
		else
		{
			return abort(401);
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		if(Auth::user()->rol->permisos->contains(3))
		{
			$prmUsuario = Usuario::findOrFail($id);
			$prmRol = Rol::All();
			return view('admin.usuario.edit',compact('prmUsuario','prmRol'));
		}
		else
		{
			return abort(401);
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		if(Auth::user()->rol->permisos->contains(3))
		{
			$validator = $this->validate($request, [
				'nombre' => 'required|alpha_dash',
				'email' => 'required|Between:3,64|Email|Unique:usuarios,email,'.$id,
				'id_rol' => 'required|integer'
			]);
		
			$usuario = Usuario::findOrFail($id);

			$input = $request->all();

			$usuario->fill($input);
			$usuario->save();
		
			Session::flash('mensaje', 'Usuario Actualizado!!!');
		
			return redirect()->route('admin.usuario.show',[$id]);
		}
		else
		{
			return abort(401);
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		if(Auth::user()->rol->permisos->contains(2))
		{
        $usuario = Usuario::findOrFail($id);

		$usuario->delete();

		Session::flash('mensaje', 'Usuario Borrado!!!');
		
		return redirect()->route('admin.usuario.index');
		}
		else
		{
			return abort(401);
		}
    }
}
