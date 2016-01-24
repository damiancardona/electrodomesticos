@extends('layouts.adminbase')

@section('titulo', 'Editar - Usuarios')

@section('subtituloAdmin','Edicion del Usuario')

@section('contenidoAdmin')
<div class="container-fluid">	
	<form action="/admin/usuario/{{$prmUsuario->id}}" method="POST">
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
			<label for="lblNombre">Nombre</label>
			<input class="form-control" type="text" name="nombre" value="{{$prmUsuario->nombre}}" placeholder="Nombre del usuario">
		</div>
		<div class="form-group">
			<label for="lblEmail">E-mail</label>
			<input class="form-control" type="text" name="email" value="{{$prmUsuario->email}}" placeholder="E-mail del usuario">
		</div>
		<div class="form-group">
			<label for="lblIDrol">Rol</label>
			<select name="id_rol" class="form-control">
				@foreach($prmRol as $irol)
				@if($irol->id == $prmUsuario->id_rol)
				<option value="{{$irol->id}}" selected>{{$irol->descripcion}}</option>
				@else
				<option value="{{$irol->id}}">{{$irol->descripcion}}</option>
				@endif
				@endforeach								
			</select>
		</div>
		<div class="btn-group" role="group" aria-label="...">
			<a href="/admin/usuario/{{$prmUsuario->id}}/"><button type="button" class="btn btn-success">Cancelar</button></a>
			<a href="#"><button type="submit" value="submit" class="btn btn-warning">Guardar</button></a>
		</div>
	</form>
</div>
@endsection