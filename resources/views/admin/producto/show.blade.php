@extends('layouts.adminbase')

@section('titulo', 'Ver - Producto')

@section('subtituloAdmin','Informacion del Producto')

@section('contenidoAdmin')
<div class="container-fluid">
	<div class="container-fluid table-responsive">
		<table class="table table-user-information">
			<tr class="info"><td class="text-center LetraOscura">ID</td><td>{{$prmProducto->id}}</td></tr>
			<tr><td class="text-center LetraOscura">Nombre</td><td>{{$prmProducto->nombre}}</td></tr>
			<tr><td class="text-center LetraOscura">Precio</td><td>${{number_format($prmProducto->precio, 2,'.','')}}</td></tr>
			<tr><td class="text-center LetraOscura">Imagen</td><td><img alt="[imagen_{{$prmProducto->nombre}}]" src="{{url($prmProducto->imagen)}}"/></td></tr>
			<tr class="success"><td class="text-center LetraOscura">Stock</td><td>{{$prmProducto->stock()->cantidad}}</td></tr>
		</table>
	</div>
	
	<div class="container-fluid">
			<div class="btn-group" role="group" aria-label="...">
				<a href="/admin/producto"><button type="button" class="btn btn-success">Volver</button></a>
				<a href="/admin/producto/{{$prmProducto->id}}/edit"><button type="button" class="btn btn-warning">Modificar</button></a>
				<!-- Boton modal -->
				<a href="#"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModal">Borrar</button></a>
			</div>			
	</div>
	
</div>

<!-- Modal -->
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="{color:#fff;}">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Borrar Producto</h4>
      </div>
      <div class="modal-body">
        Desea borrar el producto <strong>{{$prmProducto->nombre}}</strong>?
      </div>
      <div class="modal-footer">
		<!-- Accion de borrado -->
		<form action="/admin/producto/{{$prmProducto->id}}" method="POST">
			<input type="hidden" name="_method" value="DELETE">
			<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
			<button type="submit" value="submit" class="btn btn-danger">Si</button>
		</form>
      </div>
    </div>
  </div>
</div>
@endsection