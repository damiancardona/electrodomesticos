@extends('layouts.adminbase')

@section('titulo', 'Creacion - Producto')

@section('subtituloAdmin','Nuevo Producto')

@section('contenidoAdmin')
<div class="container-fluid">
	<form action="/admin/producto" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="lblNombre">Nombre</label>
			<input class="form-control" type="text" name="nombre" value="" placeholder="Nombre del producto">
		</div>
		<div class="form-group">
			<label for="lblPrecio">Precio</label>
			<input class="form-control" type="text" name="precio" value="" placeholder="Precio del producto">
		</div>
		<div class="form-group">
			<label for="lblStock">Stock</label>
			<input class="form-control" type="text" name="stock" value="" placeholder="Stock del producto">
		</div>
		<div class="form-group">
			<label for="lblStock">Imagen</label>
			<input type="file" id="imagen" name="imagen">
		</div>
		<div class="btn-group" role="group" aria-label="...">			
			<a href="#"><button type="submit" value="submit" class="btn btn-success">Guardar</button></a>
			<a href="/admin/producto"><button type="button" class="btn btn-danger">Cancelar</button></a>
		</div>
	</form>
</div>
@endsection