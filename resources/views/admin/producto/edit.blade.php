@extends('layouts.adminbase')

@section('titulo', 'Editar - Producto')

@section('subtituloAdmin','Edicion del producto')

@section('contenidoAdmin')
<div class="container-fluid">	
	<form action="/admin/producto/{{$prmProducto->id}}" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
			<label for="lblNombre">Nombre</label>
			<input class="form-control" type="text" name="nombre" value="{{$prmProducto->nombre}}" placeholder="Nombre del producto">
		</div>
		<div class="form-group">
			<label for="lblPrecio">Precio</label>
			<input class="form-control" type="text" name="precio" value="{{number_format($prmProducto->precio, 2,'.','')}}" placeholder="Precio del producto">
		</div>		
		<div class="form-group">
			<label for="lblStock">Stock</label>
			<input class="form-control" type="text" name="stock" value="{{$prmProducto->stock()->cantidad}}" placeholder="Stock del producto">
		</div>
		<div class="form-group">
			<label for="lblStock">Imagen</label>
			<input type="file" id="imagen" name="imagen">
		</div>
		<div class="btn-group" role="group" aria-label="...">
			<a href="/admin/producto/{{$prmProducto->id}}/"><button type="button" class="btn btn-success">Cancelar</button></a>
			<a href="#"><button type="submit" value="submit" class="btn btn-warning">Guardar</button></a>
		</div>
	</form>
</div>
@endsection