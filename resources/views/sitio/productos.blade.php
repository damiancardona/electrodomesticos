@extends('layouts.menu')

@section('titulo','Catalog - Productos')

@section('contenidoAppMenu')

@if($prmProductos->isEmpty())
<div class="jumbotron">
  <h1>Oops!!</h1>
  <p>lo sentimos, pero no se encontro ningun producto.</p>    
</div>
@else
<div class="row">
	@for($i = 0; $i < $prmProductos->count(); $i+=4)
		@for($j = 0; $j < 4; $j++)
			@if($i+$j < $prmProductos->count())
	<div class="col-xs-12 col-sm-6 col-md-3">
		<div class="thumbnail">
			<img src="{{url($prmProductos[$i+$j]->imagen)}}" alt="[imagen_]"/>
			<div class="caption text-center">
				<h4>{{$prmProductos[$i+$j]->nombre}}</h4>
				<h6>Precio: ${{$prmProductos[$i+$j]->precio}}</h6>
				<p><a href="{{url('/sitio/producto/info/'.$prmProductos[$i+$j]->id)}}" class="btn btn-primary" role="button">Ver</a></p>
			</div>			
		</div>				
	</div>
			@endif
		@endfor
	@endfor
</div>

<div class="container-fluid">{!! $prmProductos->links() !!}</div>
@endif
@stop