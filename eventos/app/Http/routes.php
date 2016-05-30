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

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('template', function () {
    return View::make('template'); 
 });

Route::get('que', function () {
    return view('que');
});
Route::get('quienes', function () {
    return view('quienes');

Route::get('registro', function () {
    return view('registro');
});

Route::get('login', function () {
    return view('login');
});

Route::get('contacto', function () {
    return view('contacto');
});
});*/
/*INDEX */
Route::get('index', 'DescripcionesController@index');
/*QUE ES */
Route::get('que', 'DescripcionesController@que');
/*QUIENES SOMOS */
Route::get('quienes', 'DescripcionesController@quienes');
/*CONTACTO */
Route::get('contacto', 'DescripcionesController@contacto');

/*REGISTRO */
Route::get('registro', 'RegistroController@registro');
/*LOGIN */
Route::get('login', 'UsuariosController@login');
Route::post('login', 'UsuariosController@login');




/*ORGANIZA EVENTO */
Route::get('organizaEvento', function () {
    return view('organizaEvento');
});
/*MIS EVENTOS */
Route::get('misEventos', function () {
    return view('misEventos');
});




