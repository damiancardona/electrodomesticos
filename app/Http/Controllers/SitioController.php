<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Producto;
use Session;

class SitioController extends Controller
{
	public function paginaProductos()
	{
		$prmProductos = Producto::paginate(8);
		return view('sitio.productos',compact('prmProductos'));
	}
	
    public function formContacto(){
		return view('sitio.contacto');
	}
	
	public function informacionProducto($id)
	{
		$prmProducto = Producto::findOrFail($id);

		return view('sitio.producto.info',compact('prmProducto'));
	}
	
	public function listaPromociones()
	{
		$tmppro = Producto::all();
		$listID = [];
		
		foreach($tmppro as $pro)
		{
			if($pro->tienePromocion())
			{
				array_push($listID,$pro->id);
			}
		}

		$prmProductos = Producto::whereIn('id', $listID)->paginate(8);
		return view('sitio.productos',compact('prmProductos'));
	}
	
	public function buscarProducto(Request $request)
	{
		$prmProductos =  Producto::where('nombre', 'LIKE', '%'.$request['nomProducto'].'%')
									->paginate(8);		
		return view('sitio.productos',compact('prmProductos'))->with('nomProducto', $request['nomProducto']);
	}
	
	public function send(Request $request){
		
		$validator = $this->validate($request, [
			'nombre' => 'required|min:3|max:20',
			'email' => 'required|Between:3,64|email',
			'mensaje' => 'required|min:3'
		]);	
		
		$input = $request->all();
		
		/* descomentar para enviar mail */
		Mail::send('sitio.emails.contacto',
        array(
            'nombre' => $input['nombre'],
            'email' => $input['email'],
            'mensaje' => $input['mensaje']
        ), function($message) use ($input){
			$message->from($input['email']);
			$message->to(env('MAIL_USERNAME'), 'Electrodomestico')->subject('Consulta Electrodomestico');
		});
		
		Session::flash('mensaje', 'Su mensaje fue enviado!!!');
		
		return view('sitio.contacto');
	}
}
