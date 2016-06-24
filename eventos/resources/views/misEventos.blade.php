@extends('admin.template.layout')
@section('title')
    Mis Eventos
@endsection
@section('content')
<h1>Mis Eventos</h1>
<ul class="nav navbar-right">  
  <a href="{{ url('organizaEvento') }}" class="btn btn-warning">Organizar evento +</a><br><br>
</ul>
<div class="container">
	<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Nombre evento</th>
      <th>Lugar</th>
      <th>Fecha</th>
      <th>Organizador</th>
      <th>Invitados/confirmados</th>
    </tr>
  </thead>
  <tbody>
	   <tr>
	      <td> -</td>
	      <td> -</td>
	      <td> -</td>
	      <td> -</td>
	      <td> -</td>
	    </tr>
	    <tr class="warning">
	      <td> -</td>
	      <td> -</td>
	      <td> -</td>
	      <td> -</td>
	      <td> -</td>
	    </tr>
  </tbody>
</table> 
</div>
@endsection