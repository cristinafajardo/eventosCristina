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

/*INDEX */
Route::get('index', 'DescripcionesController@index');
/*QUE ES */
Route::get('que', 'DescripcionesController@que');
/*QUIENES SOMOS */
Route::get('quienes', 'DescripcionesController@quienes');
/*CONTACTO */
Route::get('contacto', 'DescripcionesController@contacto');

/*REGISTRO */
Route::resource('usuarios', 'UsuariosController');
Route::get('registro', 'UsuariosController@create');
//Route::post('registro', 'UsuariosController@login');
/*Route::group(['prefix'=> 'admin'], function() {
    //
    
});*/

/*LOGIN */
Route::get('login', 'UsuariosController@login');
Route::post('login','UsuariosController@post_login');





/*ORGANIZA EVENTO */
Route::get('organizaEvento', function () {
    return view('organizaEvento');
});
/*MIS EVENTOS */
Route::get('misEventos', function () {
    return view('misEventos');
});




