@extends('layouts.adminbase')

@section('titulo', 'Creacion - Usuario')

@section('subtituloAdmin','Nuevo Usuario')

@section('contenidoAdmin')

<div class="container-fluid">
	<form action="/admin/usuario" method="POST">	
		<div class="form-group">
			<label for="lblNombre">Nombre</label>
			<input class="form-control" type="text" name="nombre" value="" placeholder="Nombre del usuario">
		</div>
		<div class="form-group">
			<label for="lblEmail">E-mail</label>
			<input class="form-control" type="text" name="email" value="" placeholder="E-mail del usuario">
		</div>
		<div class="form-group">
			<label for="lblPassword">Password</label>
			<input class="form-control" type="password" name="password" value="" placeholder="Password del usuario">
		</div>
		<div class="form-group">
			<label for="lblPasswordC">Confirmar Password</label>
			<input class="form-control" type="password" name="password_confirmation" value="" placeholder="Password del usuario">
		</div>
		<div class="form-group">
			<label for="lblIDrol">Rol</label>
			<select name="id_rol" class="form-control">
				@foreach($prmRol as $irol)				
				<option value="{{$irol->id}}">{{$irol->descripcion}}</option>
				@endforeach								
			</select>
		</div>
		<div class="btn-group" role="group" aria-label="...">			
			<a href="#"><button type="submit" value="submit" class="btn btn-success">Guardar</button></a>
			<a href="/admin/usuario"><button type="button" class="btn btn-danger">Cancelar</button></a>
		</div>
	</form>
</div>
@endsection