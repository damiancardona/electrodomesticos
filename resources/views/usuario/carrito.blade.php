@extends('layouts.menu')

@section('titulo','Carrio')

@section('contenidoAppMenu')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3>Contenido del carrito</h3>
	</div>
	<div class="panel-body">
		<div class="container-fluid">
			@if(Session::has('mensaje'))								
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>{{ Session::get('mensaje') }}</strong>
			</div>
			@endif
								
			@if($errors->any())
			<div class="alert alert-danger">										
				<ul>
					@foreach ($errors->all() as $error)
					<li><strong>{{ $error }}</strong></li>
					@endforeach
				</ul>
			</div>
			@endif
			<table class="table table-bordered table-striped table-condensed text-center">
				<tr class="info">
					<th>Nombre</th>
					<th>cantidad</th>
					<th>presio unitario</th>
					<th></th>
				</tr>
				@foreach($carrito as $ID => $productos)
				<tr>
					<td>{{$productos['nombre']}}</td>
					<td>{{$productos['cantidad']}}</td>
					<td>${{number_format($productos['precio'],2,'.',',')}}</td>
				<td>
					<form action="/usuario/carrito/del/{{$ID}}" method="GET">
						<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
					</form>
				</td>				
				</tr>
				@endforeach
				@if(!empty($carrito))				
				<tr class="warning LetraOscura">
					<td  colspan="2">Total</td>					
					<td>${{number_format($total,2,'.',',')}}</td>
				</tr>
				@endif
			</table>
		</div>
	</div>
	@if(!empty($carrito))
	<div class="panel-footer">
		<div class="btn-group btn-group-justified" role="group" aria-label="...">
			<a href="/usuario/carrito/sale"><button type="submit" class="btn btn-success">Terminar compra</button></a>
			<a href="/usuario/carrito/clear"><button type="submit" class="btn btn-danger">Limpiar carrito</button></a>
		</div>
	</div>	
	@endif
</div>	
@stop