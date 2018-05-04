@extends('admin.template.layout')
@section('title')
    Que es Eventos
@endsection
@section('content')
<div class="container">
    <legend> Qué es Eventos</legend>
  <div class="row">
    <h4>Esta aplicación web surge de un proyecto inicial conjunto, realizado con Javier Morabes y Ezequiel Torres, denominado "Meating".
</h4> <br>
        <div class="col-sm-8 col-md-6">
            <div class="thumbnail">
                <img src="{{ asset('img/misEventos.png') }}" alt="...">
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
           
           <h4>Permite organizar eventos de manera rápida y sencilla, con sólo algunos clicks.</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-4">
           <h4>Podrás invitar a tus amigos, enviarles un mapa con la dirección para que no se pierdan, 
            asignarle a cada uno lo que debe traer o comunicarles cuánto dinero debe aportar.</h4>
            
        </div>
        <div class="col-sm-8 col-md-6">
            <div class="thumbnail">
                <img src="{{ asset('img/mapa.png') }}" alt="...">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col-md-6">
            <div class="thumbnail">
                <img src="{{ asset('img/listas.png') }}" alt="...">
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
             <h4>Para poder utilizar estos servicios, sólo tenés que registrarte y listo! Ya podes comenzar a 
                organizar todo e invitar a quien quieras, sólo con su dirección de e-mail.</h4>
        </div>
    </div>
</div>
@endsection