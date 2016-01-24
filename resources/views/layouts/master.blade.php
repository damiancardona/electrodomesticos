<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>@yield('titulo','Sin titulo')</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		
		<!-- Jquery -->
			<script src="{{asset('asset/js/jquery-1.12.0.min.js')}}"  type="text/javascript"></script>		
		<!-- Fin Jquery -->
		
		<!-- Boorstrap -->
			<!-- Compatibilidad con Celulares - Zoom -->
			<meta name="viewport" content="width=device-width, initial-scale=1"/>
			<!-- Librerias -->
			<link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}" type="text/css"/>
			<link rel="stylesheet" href="{{asset('asset/css/bootstrap-theme.css')}}" type="text/css"/>
			<script src="{{asset('asset/js/bootstrap.min.js')}}"  type="text/javascript"></script>
		<!-- Fin Boorstrap -->
		
		<!-- Personal -->
			<link rel="stylesheet" href="{{asset('asset/personales/Stickyfooterstyles.css')}}" type="text/css"/>
		<!-- Fin Personal -->
		
	</head>
	<body>
				
		<!-- Barra de navegacion -->
		<div class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
				
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-master" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
					<a class="navbar-brand" href="/">Electrodomesticos</a>
		
				</div>				

				<div class="collapse navbar-collapse" id="bs-navbar-collapse-master">
					<form class="navbar-form navbar-left" role="search" action="/sitio/productos/busqueda" method="get"">
						<div class="input-group">
							<input type="text" name="nomProducto" value="{{ isset($nomProducto) ? $nomProducto : '' }}" class="form-control" placeholder="Buscar producto..."/>
							<div class="input-group-btn">
								<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
							</div>
						</div>
					</form>
					<!-- Right Side Of Navbar -->
					<ul class="nav navbar-nav navbar-right">
						<!-- Authentication Links -->
						@if (Auth::guest())
							<li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login</a></li>
							<li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Registrarse</a></li>
						@else
							<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<span class="glyphicon glyphicon-off" aria-hidden="true"></span> 
								{{ Auth::user()->nombre }}<span class="caret"></span>
							</a>

							<ul class="dropdown-menu">
								<li><a href="{{url('usuario/info')}}"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
								<li><a href="{{url('/usuario/carrito')}}"><span class="glyphicon glyphicon-shopping-cart"></span> Carrito</a></li>
								<li role="separator" class="divider"></li>
								@if(Auth::user()->id_rol == 2)
								<li><a href="{{ url('/admin') }}"><span class="glyphicon glyphicon-cog"></span> Panel de Administracion</a></li>
								<li role="separator" class="divider"></li>
								@endif
								<li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Salir</a></li>
							</ul>
						</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
		
		<!-- Contenido central -->
		<div class="container-fluid">
			@yield('contenidoMaster')
		</div>
		
		<!-- Pie -->	
		<div id="footer" class="footer">
			<div class="container text-center">
				<p class="footer-block"><strong>Electrodomesticos inc.</strong> <strong>Tel.:</strong> (0341) 455-5555/475-9632. <strong>Direccion:</strong> Calle Belgrano 452 (Rosario, Santa Fe, Argentina).</p>
			</div>
		</div>
		
	</body>
</html>