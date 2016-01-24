@extends('layouts.master')

@section('contenidoMaster')
	<div class="row">
				
		<!-- barra lateral -->
		<div class="col-md-3">			
			<div class="sidebar-nav">						
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4>Menu de acciones</h4>
					</div>
					<div class="panel-body">
						<div class="list-group">
							<a href="/admin/usuario/" class="list-group-item LetraOscura">Usuario <span class="badge">ABM</span></a>
							<a href="/admin/producto/" class="list-group-item LetraOscura">Porductos <span class="badge">ABM</span></a>
						</div>									
					</div>
				</div>						
			</div>
		</div>
				
		<!-- Contenido -->
		<div class="col-md-9">
			
			<div class="container-fluid">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4>@yield('subtituloAdmin')</h4>
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
						</div>
								
						@yield('contenidoAdmin')
					</div>
				</div>				
			</div>
			
		</div>
		
	</div>
@stop