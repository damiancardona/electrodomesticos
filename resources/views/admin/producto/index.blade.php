@extends('layouts.adminbase')

@section('titulo', 'Lista - Productos')

@section('subtituloAdmin','Productos')

@section('contenidoAdmin')

<div class="container-fluid table-responsive">
	<table class='table table-striped table-bordered'>
		<tr>
			<th>Nombre</th>				
			<th>Stock</th>
			<th></th>
		</tr>
		@foreach($prmProducto as $producto)
		<tr>
			<td>{{$producto->nombre}}</td>
			<td>{{$producto->stock()->cantidad}}</td>
			<td>
				<a href="/admin/producto/{{$producto->id}}">
					<button type="button" class="btn btn-primary">Ver</button>
				</a>
			</td>
		</tr>
		@endforeach
	</table>	
</div>

<div class="container-fluid">{!! $prmProducto->links() !!}</div>

<div class="container-fluid">
	<div class="btn-group" role="group" aria-label="...">
		<a href="/admin/producto/create"><button type="button" class="btn btn-success">Nuevo Producto</button></a>
	</div>	
</div>
@endsection