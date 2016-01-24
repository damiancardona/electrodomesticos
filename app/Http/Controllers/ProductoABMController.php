<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Stock;
use Session;
use Storage;
use File;

class ProductoABMController extends Controller
{
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		if(Auth::user()->rol->permisos->contains(9))
		{
			$prmProducto = Producto::paginate(5);		
			return view('admin.producto.index',compact('prmProducto'));
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
		if(Auth::user()->rol->permisos->contains(6))
		{
			return view('admin.producto.create');
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
		
		if(Auth::user()->rol->permisos->contains(6))
		{

			$validator = Validator::make($request->all(), [
				'nombre' => 'required|unique:productos,nombre',
				'precio' => 'required|numeric',
				'stock' => 'required|integer',
				'imagen' => 'required|image'
			]);
			
			$validator->after(function($validator) use ($request) {
				if ($this->VerificarDimensionImagen($request->file('imagen'))) {
					$validator->errors()->add('field', 'La imagen debe ser de 500px X 500px.');
				}
			});
			
			if ($validator->fails()) {
				return back()->withErrors($validator);
			}
			
			$input = $request->except('stock');
			
			$nProducto = Producto::create($input);
			$nProducto->imagen = $this->GuardarImagen($request);
			
			$nStock = Stock::create();
			$nStock->id_producto = $nProducto->id;
			$nStock->cantidad = (int)$request->stock;
		
			$nProducto->save();		
			$nStock->save();
		
			Session::flash('mensaje', 'Nuevo Producto guardado!!!');
		
			return redirect()->route('admin.producto.index');
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
		if(Auth::user()->rol->permisos->contains(10))
		{
			$prmProducto = Producto::findOrFail($id);	
			return view('admin.producto.show',compact('prmProducto'));
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
		if(Auth::user()->rol->permisos->contains(8))
		{
			$prmProducto = Producto::findOrFail($id);
			return view('admin.producto.edit',compact('prmProducto'));
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
		if(Auth::user()->rol->permisos->contains(8))
		{
			$validator = Validator::make($request->all(), [
				'nombre' => 'required|unique:productos,nombre,'.$id,
				'precio' => 'required|numeric',
				'stock' => 'required|integer'
			]);

			if ($validator->fails()) {
				return back()->withErrors($validator);
			}
			
			$producto = Producto::find($id);

			$input = $request->except('stock');

			$producto->fill($input);
			
		
			$stock = $producto->stock();			
			$stock->cantidad = (int)$request->stock;			
			$stock->save();
			
			if($request->hasFile('imagen'))
			{
				$validator->after(function($validator) use ($request) {
					if ($this->VerificarDimensionImagen($request->file('imagen'))) {
						$validator->errors()->add('field', 'La imagen debe ser de 500px X 500px.');
					}
				});
				
				if ($validator->fails()) {
				return back()->withErrors($validator);
			}
				$producto->imagen = $this->GuardarImagen($request);
			}
			$producto->save();
			
			Session::flash('mensaje', 'Producto Actualizado!!!');
		
			return redirect()->route('admin.producto.show',[$id]);
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
		if(Auth::user()->rol->permisos->contains(7))
		{
			$producto = Producto::findOrFail($id);

			$producto->delete();

			Session::flash('mensaje', 'Producto Borrado!!!');
		
			return redirect()->route('admin.producto.index');
		}
		else
		{
			return abort(401);
		}
    }
	
	private function GuardarImagen(Request $request)
	{
		$imgnom = md5(pathinfo($request->file('imagen')->getClientOriginalName())['filename']);
		$imgext = pathinfo($request->file('imagen')->getClientOriginalName())['extension'];
		$imgfinal = $imgnom.'.'.$imgext;
		
		if(!Storage::disk('local')->exists($imgfinal))
		{
			Storage::disk('local')->put($imgfinal, File::get($request->file('imagen')));
		}
		return asset('/img/producto/'.$imgfinal);	
	}
	
	private function VerificarDimensionImagen($imagen)
	{
		$maxH = 500;
		$maxW = 500;
		list($w, $h) = getimagesize($imagen);		
		return !( ($w <= $maxW) && ($h <= $maxH) );
	}
}
