<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* Sitios */
Route::get('/',function(){return view('sitio.info');});
Route::get('/home',function(){return view('sitio.info');});
Route::get('/sitio/info',function(){return view('sitio.info');});

/* Contacto */
Route::get('/sitio/contacto','SitioController@formContacto');
Route::post('/sitio/contacto','SitioController@send');

/* Productos */
Route::get('/sitio/productos','SitioController@paginaProductos');
Route::get('/sitio/productos/busqueda','SitioController@buscarProducto');
Route::get('/sitio/producto/info/{id}','SitioController@informacionProducto');
Route::get('/sitio/promociones','SitioController@listaPromociones');

/* Usuario */
Route::get('/usuario/info','UsuarioSitioController@informacion');

/* Carrito */
Route::get('/usuario/carrito','CarritoController@MostarCarrito');
Route::post('/usuario/carrito/add/{id}','CarritoController@AgregarItemCarrito');
Route::get('/usuario/carrito/del/{id}','CarritoController@BorrarItemCarrito');
Route::get('/usuario/carrito/clear','CarritoController@LimpiarCarrito');
Route::get('/usuario/carrito/sale','CarritoController@TotalCarrito');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();
});

Route::group(['middleware' => ['auth','rol:2']], function()
{
    Route::get('/admin',
					function()
					{
						if(Auth::user()->rol->permisos->contains(11))
						{
							return view('admin.index');
						}
						else
						{
							return abort(401);
						}
					}
				);
	Route::resource('/admin/usuario','UsuarioABMController');
	Route::resource('/admin/producto','ProductoABMController');
});
