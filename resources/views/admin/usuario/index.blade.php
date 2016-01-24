@extends('layouts.adminbase')

@section('titulo', 'Lista - Usuarios')

@section('subtituloAdmin','Usuarios')

@section('contenidoAdmin')

<div class="container-fluid table-responsive">
	<table class='table table-striped table-bordered'>
		<tr>
			<th>Nombre</th>
			<th>Email</th>
			<th>Rol</th>		
			<th></th>
		</tr>
		@foreach($prmUsuario as $usuario)
		<tr>
			<td>{{$usuario->nombre}}</td>
			<td>{{$usuario->email}}</td>			
			<td>{{$usuario->rol->descripcion}}</td>
			<td>
				<a href="/admin/usuario/{{$usuario->id}}">
					<button type="button" class="btn btn-primary">Ver</button>
				</a>
			</td>
		</tr>
		@endforeach
	</table>	
</div>

<div class="container-fluid">{!! $prmUsuario->links() !!}</div>

<div class="container-fluid">
	<div class="btn-group" role="group" aria-label="...">
		<a href="/admin/usuario/create"><button type="button" class="btn btn-success">Nuevo Usuario</button></a>
	</div>	
</div>
@endsection