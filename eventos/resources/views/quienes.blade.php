@extends('admin.template.layout')
@section('title')
    Quienes somos
@endsection
@section('content')
<div class="container">
  <legend>Quienes somos</legend>
	<div class="row">
      <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
              <img src="{{ asset('img/perfil.jpg') }}" alt="...">
          </div>
      </div>
      <div class="col-sm-6 col-md-4">
         <legend>
              Cristina Fajardo
         </legend>
          <h4> Estudiante de Ingeniería en Informática en Universidad FASTA Bariloche. <br>
           Desarrollo y diseño de esta aplicación web. </h4>
         <small><i class="glyphicon glyphicon-map-marker"></i><cite title="Bariloche, Arg">Bariloche, ARG 
        </cite></small>
      </div>
    </div>
</div>
@endsection