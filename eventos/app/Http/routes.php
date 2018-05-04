<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*VISTAS SIN FUNCIONALIDAD */
Route::get('/', 'DescripcionesController@index');/*INDEX */
Route::get('que', 'DescripcionesController@que');/*QUE ES */
Route::get('quienes', 'DescripcionesController@quienes');/*QUIENES SOMOS */
Route::get('contacto', 'DescripcionesController@contacto');/*CONTACTO */

/*------------------------------------------------------------------------------*/
/*------------------------------------------------------------------------------*/
/*REGISTRO */
Route::resource('perfil', 'UsuariosController');
Route::get('registro', 'UsuariosController@create');//muestra la vista de registro de usuario
Route::get('conf_reg','UsuariosController@conf_reg');
Route::post('registro', 'UsuariosController@store'); //guardo el usuario nuevo en bd
Route::resource('mail', 'MailController@store'); //envia mail de confirmacion de registro

/*------------------------------------------------------------------------------*/
/*------------------------------------------------------------------------------*/
/*LOGIN */
Route::get('login', 'UsuariosController@login');//MUESTRA LA VISTA CON FORM DE LOGIN
Route::post('login','UsuariosController@post_login'); //ENVIA LOS DATOS DEL USUARIO
Route::get('logout', 'UsuariosController@logout'); //CIERRA LA SESION
//MUESTRA PERFIL DEL USUARIO
Route::get('perfil/{id}/verPerfil',  [
'uses' => 'UsuariosController@verPerfil',
'as' => 'perfil.verPerfil']
); 
Route::get('perfil', 'UsuariosController@perfil');
/*------------------------------------------------------------------------------*/
/*------------------------------------------------------------------------------*/
/*ORGANIZA EVENTO */
Route::get('organizaEvento', function () {
    return view('organizaEvento');
});
Route::post('organizaEvento', 'EventosController@store');//ENVIA DATOS DE EVENTO NUEVO A BD
/*------------------------------------------------------------------------------*/
/*------------------------------------------------------------------------------*/
/*MIS EVENTOS */
Route::resource('misEventos', 'EventosController');
Route::get('misEventos', 'EventosController@index');//LISTA EVENTOS DEL USUARIO
/*------------------------------------------------------------------------------*/
/*------------------------------------------------------------------------------*/
/*ELIMINAR EVENTO*/
Route::get('misEventos/{id}/destroy', [
'uses' => 'EventosController@destroy',
'as' => 'misEventos.destroy']
);
/*MAPA*/
Route::get('mapahdp', function () {
    return view('mapahdp');
});
//RUTAS PARA SUBIR FOTOS
Route::resource('upfotos','FotosController');
//ELIMINAR FOTO
Route::get('upfotos/{id}/destroy', [
'uses' => 'FotosController@destroy',
'as' => 'upfotos.destroy']
);
//RUTAS PARA ITEMS
Route::resource('compras','ItemsController');
//ELIMINAR ITEM
Route::get('compras/{id}/destroy', [
'uses' => 'ItemsController@destroy',
'as' => 'compras.destroy']
);
//RUTAS PARA ITEMSok
//ELIMINA ITEM ASIGNADO
Route::get('comprasok/{id}/destroy', [
'uses' => 'ItemsOksController@destroy',
'as' => 'comprasok.destroy']
);
Route::post('llevarItem','ItemsController@llevarItem');
Route::post('asignarItem','ItemsController@asignarItem');

//RUTAS PARA INVITADOS
Route::resource('invitados','InvitadosController');
//ELIMINAR INVITADO
Route::get('invitados/{id}/destroy', [
'uses' => 'InvitadosController@destroy',
'as' => 'invitados.destroy']
);
//RENDIR GASTOS
Route::post('misEventos/{id}/rendirGastos',[
	'uses'=>'EventosController@rendirGastos',
	'as'=>'misEventos.rendirGastos']
	);
Route::post('gastosinvitados/{id}/gastosOrganizador',[
	'uses'=>'EventosController@gastosOrganizador',
	'as'=>'gastosinvitados.gastosOrganizador']
	);


//CONFIRMAR ASISTENCIA
Route::post('ir','EventosController@confirmarAsistencia');
//RUTAS PARA CUENTAS
Route::post('cuentas','EventosController@cuentas');
//REENVIAR INVITACION GRUPAL
Route::get('/invitados/{id}/reInvitar', [
	'uses'=>'InvitadosController@reInvitar',
	'as'=>'invitados.reInvitar']
	);
//REENVIAR INVITACION  INDIVIDUAL
Route::get('/invitados/{id}/{idevento}/reenviarInvitacion', [
	'uses'=>'InvitadosController@reenviarInvitacion',
	'as'=>'invitados.reenviarInvitacion']
	);
//ENVIAR CUENTAS
Route::get('/invitados/{id}/enviarCuentas', [
	'uses'=>'InvitadosController@enviarCuentas',
	'as'=>'invitados.enviarCuentas']
	);
//ENVIAR LISTA DE COMPRAS
Route::get('/compras/{id}/enviarCompras', [
	'uses'=>'InvitadosController@enviarCompras',
	'as'=>'compras.enviarCompras']
	);

Route::post('cerrarEvento','EventosController@cerrarEvento');
//Route::post('editarPerfil','UsuariosController@editarPerfil');