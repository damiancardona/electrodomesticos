<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>@yield('titulo','Sin titulo')</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		
		<!-- Jquery -->
			<script src="{{asset('asset/js/jquery-1.12.0.min.js')}}"></script>		
		<!-- Fin Jquery -->
		
		<!-- Boorstrap -->
			<!-- Compatibilidad con Celulares - Zoom -->
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<!-- Librerias -->
			<link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">
			<link rel="stylesheet" href="{{asset('asset/css/bootstrap-theme.css')}}">
			<script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
		<!-- Fin Boorstrap -->
		
		<!-- Personal -->
			<link rel="stylesheet" href="{{asset('asset/personales/Stickyfooterstyles.css')}}">
		<!-- Fin Personal -->
		
	</head>
	<body>
				
	<!-- Barra de navegacion -->
	<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>-->
					<a class="navbar-brand" href="/admin/">Panel de administracion</a>
				</div><!--<div id="navbar" class="collapse navbar-collapse"></div>-->		
			
			<div class="collapse navbar-collapse">
				<!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->nombre }} <span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							@if(Auth::user()->id_rol == 2)
								<li><a href="{{ url('/admin') }}">Panel de Administracion</a></li>
								<li role="separator" class="divider"></li>
							@endif
                                <li><a href="{{ url('/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
			</div>
			</div>
		</nav>
		
		<!-- Contenido central -->		
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
									<a href="/admin/usuario/" class="list-group-item">Usuario <span class="badge">ABM</span></a>
									<a href="/admin/producto/" class="list-group-item">Porductos <span class="badge">ABM</span></a>
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
								<h4>@yield('subtitulo')</h4>
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
								
								@yield('contenido')
							</div>
						</div>				
					</div>
				</div>
				
			</div>
		</div>
		
		<!-- Pie -->	
		<footer class="footer">
			<div class="container">
				<p class="text-muted">Contenido de pie</p>
			</div>
		</footer>
		
	</body>
</html>