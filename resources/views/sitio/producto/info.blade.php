@extends('layouts.menu')

@section('titulo','Producto')

@section('contenidoAppMenu')
@include('mensajes.error')
<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="img-responsive thumbnail" src="{{url($prmProducto->imagen)}}" alt="[imagen_{{url($prmProducto->nombre)}}]"/>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading">Informacion del producto</h4>
    <div class="panel panel-default">
			<div class="panel-body">
				<table class="table table-striped">
					<tr>
						<td><p class="text-left LetraOscura">Producto</td>
						<td><p>{{$prmProducto->nombre}}</p></td>				
					</tr>					
					@if(!$prmProducto->tienePromocion())
					<tr>
						<td><p class="text-left LetraOscura">Precio</p></td>
						<td><p>${{number_format($prmProducto->precio, 2,'.','')}}</p></td>
					</tr>
					@else
					<tr>
						<td><p class="text-left LetraOscura">Precio</p></td>
						<td><p><s>${{number_format($prmProducto->precio, 2,'.','')}}</s></p></td>
					</tr>	
					<tr class="info">
						<td><p class="text-left LetraOscura">Promocion</p></td>
						<td>${{ number_format($prmProducto->PrecioPromocional, 2,'.','')}}
							<br>(- ${{number_format($prmProducto->descuento, 2,'.','')}})</td>
					</tr>
					@endif
					<tr>
						<td><p class="text-left LetraOscura">Stock</p></td>
						<td><p>{{$prmProducto->stock()->cantidad}}</p></td>
					</tr>			
				</table>		
			</div>
			
			@if(!Auth::guest() and $prmProducto->stock()->cantidad > 0)
			<div class="panel-footer">
				<form action="/usuario/carrito/add/{{$prmProducto->id}}" method="post">
					<div class="form-group">
						<label for="lblIDrol">Cantidad</label>
						<select name="cantidad" class="form-control">
						@for($i=0;$i < $prmProducto->stock()->cantidad;$i++)
						<option value="{{$i+1}}">{{$i+1}}</option>
						@endfor
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default btn-lg">Agregar al carrito <span class="glyphicon glyphicon-shopping-cart"></span></button>
					</div>
				</form>
			</div>
			@endif
		</div>
  </div>
</div>
@stop