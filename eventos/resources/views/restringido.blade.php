@extends('admin.template.layout')
@section('title')
    Acceso Restringido
@endsection
@section('content')
  <legend>Acceso Restringido</legend>
<div class="jumbotron">
	<p>NO PODES ACCEDER A ESTA SECCIÓN SI NO ESTÁS REGISTRADO.</p>
  
  <p>REGISTRATE! ES SIMPLE!</p>

   <p><a href="{{ url('registro') }}" class="btn btn-primary" name="btnRegistrarme">Registrarme</a></p>
</div>
@endsection