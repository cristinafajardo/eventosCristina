@extends('admin.template.layout')
@section('title')
   Editar Evento
@endsection
@section('content')
	<script src="{{ asset('js/listaCerrada.js') }}"></script>
	<script src="{{ asset('js/cuentas.js') }}"></script> 
	@if(!Session::has('usuario_id'))
	        @include('registro')
	@else
		@if ($evento->creador == Session::get('usuario_id') )
			<h1>Editar evento </h1>
			<div class="container">
			    <fieldset>
			        <legend>Datos evento</legend>
			        <!-- Descripcion general del evento -->
			      	 @include('includes.eventos.datosEditar') 
				</fieldset>
				<br><br><br>
			    <!-- lista de Invitados -->
			    <fieldset id='invitados' >
					 @include('includes.eventos.invitados') 
				</fieldset><br><br>
				<!-- Calculo de gastos -->
				@if ($evento->cerrado==1)
				<fieldset id='cuentas'>
					 @include('includes.eventos.cuentas') 
				</fieldset>
				@endif
				<br><br>
				<!-- Lista de compras -->
				<fieldset id='compras' >
				 	 @include('includes.eventos.compras') 
			  	</fieldset><br><br>
			  	<!-- CHAT -->
			  	<fieldset id='chat' style="display:none;">
				     @include('includes.eventos.chat')
			    </fieldset>  
			    <br><br>
			    <!-- FOTOS -->
				<fieldset id='fotos' >
					 @include('includes.eventos.upfotos')
				     <br><br><br>
			    </fieldset>
			</div>
		@endif		
		@if ($evento->creador != Session::get('usuario_id') )
			@include('includes.eventos.eventoInvitado')
		@endif
	@endif
@endsection
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0x2gX3yarU-p7rLGjj7JUVBpxgSdmInk"></script>