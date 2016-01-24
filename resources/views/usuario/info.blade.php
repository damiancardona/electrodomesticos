@extends('layouts.menu')

@section('titulo','Perfil')

@section('contenidoAppMenu')
<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Informacion de usuario</h4>
		</div>
		<div class="panel-body">								
			<div class="container-fluid table-responsive">
				<table class="table table-user-information">
					<tr><td class="text-center LetraOscura">Nombre</td><td>{{$prmUsuario->nombre}}</td></tr>
					<tr><td class="text-center LetraOscura">E-mail</td><td>{{$prmUsuario->email}}</td></tr>			
					<tr class="success"><td class="text-center LetraOscura">Rol</td><td>{{$prmUsuario->rol->descripcion}}</td></tr>
				</table>
			</div>
		</div>
	</div>				
</div>
@stop