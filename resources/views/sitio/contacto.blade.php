@extends('layouts.menu')

@section('titulo','Contacto')

@section('contenidoAppMenu')
<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Formulario de contacto</h4>
		</div>
		<div class="panel-body">
			@include('mensajes.exito')
			@include('mensajes.error')
			<form action="/sitio/contacto" method="POST">	
				<div class="form-group">
					<label for="lblNombre">Nombre</label>
					<input class="form-control" type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Tu nombre">
				</div>
				<div class="form-group">
					<label for="lblEmail">E-mail</label>
					<input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="Tu E-mail">					
				</div>
				<div class="form-group">
					<label for="lblMensaje">Mensaje</label>
					<textarea name="mensaje" class="form-control" rows="3" >{{ old('mensaje') }}</textarea>
				</div>		
				<div class="btn-group" role="group" aria-label="...">			
					<a href="#"><button type="submit" value="submit" class="btn btn-success">Enviar</button></a>					
				</div>
			</form>
		</div>
	</div>				
</div>
@stop