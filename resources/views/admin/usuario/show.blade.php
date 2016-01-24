@extends('layouts.adminbase')

@section('titulo', 'Ver - Usuarios')

@section('subtituloAdmin','Informacion del Usuario')

@section('contenidoAdmin')
<div class="container-fluid">
	<div class="container-fluid table-responsive">
		<table class="table table-user-information">
			<tr class="info"><td class="text-center LetraOscura">ID</td><td>{{$prmUsuario->id}}</td></tr>
			<tr><td class="text-center LetraOscura">Nombre</td><td>{{$prmUsuario->nombre}}</td></tr>
			<tr><td class="text-center LetraOscura">E-mail</td><td>{{$prmUsuario->email}}</td></tr>			
			<tr class="success"><td class="text-center LetraOscura">Rol</td><td>{{$prmUsuario->rol->descripcion}}</td></tr>
		</table>
	</div>
	
	<div class="container-fluid">
			<div class="btn-group" role="group" aria-label="...">
				<a href="/admin/usuario"><button type="button" class="btn btn-success">Volver</button></a>
				<a href="/admin/usuario/{{$prmUsuario->id}}/edit"><button type="button" class="btn btn-warning">Modificar</button></a>
				<!-- Boton modal -->
				<a href="#"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModal">Borrar</button></a>
			</div>			
	</div>	
</div>

<!-- Modal -->
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="{color:#fff;}">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Borrar Usuario</h4>
      </div>
      <div class="modal-body">
        Desea borrar al usuario <strong>{{$prmUsuario->nombre}} [{{$prmUsuario->rol->descripcion}}]</strong>?
      </div>
      <div class="modal-footer">
		<!-- Accion de borrado -->
		<form action="/admin/usuario/{{$prmUsuario->id}}" method="POST">
			<input type="hidden" name="_method" value="DELETE">
			<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
			<button type="submit" value="submit" class="btn btn-danger">Si</button>
		</form>
      </div>
    </div>
  </div>
</div>
@endsection