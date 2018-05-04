@extends('admin.template.layout')
@section('title')
   Organizar Evento
@endsection
@section('content')
<script src="{{ asset('js/listaCerrada.js') }}"></script>
<script src="{{ asset('js/cuentas.js') }}"></script> 

@if(!Session::has('usuario_id'))
        @include('restringido')
 @else
	<h1>Nuevo evento</h1>
	<div class="container">
	   {!!Form::open(['method' => 'POST', 'class' => 'form-horizontal'])!!}
	      <fieldset>
	          <legend>Datos evento</legend>
	          <!-- Descripcion general del evento -->
	          	 @include('includes.eventos.datos') 
			  <!-- GMAPS -->
			  <div  class="form-group">
			  	  <label class="col-lg-2 control-label"></label>
			      <div class="col-md-10">
				  	  <p><strong>Arrastrar el marcador y hacer click sobre él para seleccionar ubicación</p></strong> 				   
			      </div>
			      
			      @include('includes.eventos.mapaEjemplo') 
			      {!!Form::text('lat','',['class'=>'form-control', 'id'=>'lat','TYPE'=>'text','style'=>"display: none"  ])!!}
			      {!!Form::text('long','',['class'=>'form-control', 'id'=>'long','TYPE'=>'text','style'=>"display: none" ])!!}
			  </div>
			  <div class="form-group">
			      <div class="col-lg-10 col-lg-offset-2">
			        <button type="reset" class="btn btn-default">Cancelar</button>
			       {!!Form::submit('Crear Evento',['id'=>'crearEvento','class' => 'btn btn-primary'])!!}
			      </div>
		      </div>
	         <br><br><br>
	   {!!Form::close()!!}
	</div>
@endif
@endsection
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0x2gX3yarU-p7rLGjj7JUVBpxgSdmInk"></script>