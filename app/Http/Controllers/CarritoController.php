<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Producto;
use App\Venta;
use App\Venta_cuerpo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class CarritoController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		if(!Session::has('carrito'))
		{
			Session::put('carrito',array());
			Session::put('carrito_total',0.0);
		}			
	}
	
	/* Mostrar */
	public function MostarCarrito()
	{
		if(Auth::user()->rol->permisos->contains(13))
		{
			$carrito = Session::get('carrito');
			$total = Session::get('carrito_total');
			
			return view('usuario.carrito',compact('carrito','total'));
		}
		else
		{
			return abort(401);
		}	
	}
	/* Agregar */
	public function AgregarItemCarrito(Request $request, $id)
	{
		if(Auth::user()->rol->permisos->contains(14))
		{
			$carrito = Session::get('carrito');
			$total = Session::get('carrito_total');
			$producto = Producto::findOrFail($id);
			
			if(isset($carrito[$producto->id]))
			{
				$total -= $carrito[$producto->id]['cantidad']*$carrito[$producto->id]['precio'];
				$carrito[$producto->id]['cantidad'] += $request['cantidad'];
			}
			else
			{
				$carrito[$producto->id]['nombre'] = $producto->nombre;
				$carrito[$producto->id]['precio'] = ($producto->tienePromocion()) ? $producto->PrecioPromocional : $producto->precio;
				$carrito[$producto->id]['cantidad'] = $request['cantidad'];
			}
			
			$total += $carrito[$producto->id]['cantidad']*$carrito[$producto->id]['precio'];
			Session::put('carrito',$carrito);
			Session::put('carrito_total',$total);
			
			return view('usuario.carrito',compact('carrito','total'));
		}
		else
		{
			return abort(401);
		}
	}
	
	/* Borrar */
	public function BorrarItemCarrito($id)
	{
		if(Auth::user()->rol->permisos->contains(15))
		{
			$carrito = Session::get('carrito');
			$total = Session::get('carrito_total');
			$producto = Producto::findOrFail($id);
			
			if(isset($carrito[$producto->id]))
			{
				$total -= $carrito[$producto->id]['cantidad']*$carrito[$producto->id]['precio'];
				unset($carrito[$producto->id]);				
				Session::put('carrito',$carrito);
				Session::put('carrito_total',$total);
			}
			
			return view('usuario.carrito',compact('carrito','total'));
		}
		else
		{
			return abort(401);
		}
	}	
	/* Limpiar */
	public function LimpiarCarrito()
	{
		if(Auth::user()->rol->permisos->contains(15))
		{
			return $this->LimpiarArraySesion();
		}
		else
		{
			return abort(401);
		}
	}
	
	/* Total	*/
	public function TotalCarrito()
	{
		if(Auth::user()->rol->permisos->contains(16))
		{
			$carrito = Session::get('carrito');
			$total = Session::get('carrito_total');
			$err = $this->reglasStock($carrito);
			
			$v = Validator::make($carrito,$err['reglas'],$err['mesajes']);
			
			if($v->fails())
			{
				return view('usuario.carrito',compact('carrito','total'))->withErrors($v);
			}		
			
			$this->GuardarVenta($carrito,$total);
			Session::flash('mensaje', 'Compra realizada correctamente!!!');	
			
			return $this->LimpiarArraySesion();
		}
		else
		{
			return abort(401);
		}
	}

	/* Funciones privadas */
	private function reglasStock($datos)
	{
		$lista = array();
		$mensajes = array();
		
		foreach($datos as $ID => $Valor)
		{
			$producto = Producto::findOrFail($ID);
			$cantMax = $producto->stock()->cantidad;
			$lista[$ID.'.cantidad'] = 'numeric|max:'.$cantMax;
			$mensajes[$ID.'.cantidad.max'] = $Valor['nombre'].' sin stock';
		}
		
		return ['reglas'=>$lista,'mesajes'=>$mensajes];
	}
	
	private function GuardarVenta($datos,$suma)
	{
		$Lista = array();
		$Venta = Venta::create(['id_usuario' => auth::user()->id,
								'fecha_compra' => Carbon::now(),
								'total' => $suma
								]);			
			
		foreach($datos as $ID => $Valor)
		{
			$vcp = Venta_cuerpo::create(['id_cabecera' =>$Venta->id,
										'id_producto' => $ID,
										'cantidad' => $Valor['cantidad'],
										'precio_unitario' => $Valor['precio']
										]);
			$vcp->save();
			$pro = Producto::findOrFail($ID);
			$stock = $pro->stock();
			$stock->cantidad -= $Valor['cantidad'];
			$stock->save();			
			$Lista[$ID]['nombre'] = $pro->nombre;
			$Lista[$ID]['cantidad'] = $Valor['cantidad'];
			$Lista[$ID]['precio'] = $Valor['precio'];
		}
		
		$Venta->save();
		$this->sendMailCompra($Venta,$Lista);
	}
	
	private function LimpiarArraySesion()
	{
		Session::put('carrito',array());
		Session::put('carrito_total',0.0);
		$carrito = Session::get('carrito');
		$total = Session::get('carrito_total');
		
		return view('usuario.carrito',compact('carrito','total'));
	}
	
	private function sendMailCompra($venta,$cuerpo)
	{
		$nombre = Auth::user()->nombre;
		$email = Auth::user()->email;
		Mail::send('usuario.emails.informe',
        array(
            'nombre' => $nombre,
            'email' => $email,
            'venta' => $venta,
			'cuerpo' => $cuerpo,
        ), function($message) use ($email){
			$message->from($email);
			$message->to(env('MAIL_USERNAME'), 'Electrodomestico')->subject('Informe de compra');
		});
	}
}
