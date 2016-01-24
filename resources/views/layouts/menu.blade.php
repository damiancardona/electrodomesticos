@extends('layouts.master')

@section('contenidoMaster')
	<div class="row">				
		<!-- barra lateral -->
		<div class="col-md-3">			
			<div class="sidebar-nav">						
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4>Menu</h4>
					</div>
					<div class="panel-body">
						<div class="list-group">
							<a href="{{url('/sitio/productos')}}" class="list-group-item LetraOscura">Productos <span class="badge " aria-hidden="true"><span class="glyphicon glyphicon-list-alt"></span></span></a>
							<a href="{{url('/sitio/promociones')}}" class="list-group-item LetraOscura">Promociones <span class="badge " aria-hidden="true"><span class="glyphicon glyphicon-gift"></span></span></a>							
							<!--<a href="{{url('/usuario/carrito')}}" class="list-group-item LetraOscura">Carrito <span class="badge " aria-hidden="true"><span class="glyphicon glyphicon-shopping-cart"></span></span></a>-->							
							<a href="{{url('/sitio/contacto')}}" class="list-group-item LetraOscura">Contato <span class="badge " aria-hidden="true"><span class="glyphicon glyphicon-envelope"></span></span></a>
							<a href="{{url('/sitio/info')}}" class="list-group-item LetraOscura">Quienes somos <span class="badge " aria-hidden="true"><span class="glyphicon glyphicon-info-sign"></span></span></a>
						</div>									
					</div>
				</div>						
			</div>
		</div>
				
		<!-- Contenido -->
		<div class="col-md-9">
			<div class="container-fluid">
				@yield('contenidoAppMenu')				
			</div>
		</div>		
	</div>
@stop