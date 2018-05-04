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
		<h1>Ver Evento</h1>
		<div class="container">
			  <fieldset>
				   <legend>Descripción</legend>
				   <div class="row">
				   {!!Form::open(['route'=> ['misEventos.update',$evento], 'method' => 'PUT', 'class' => 'form-horizontal'])!!}
					 <div class="col-sm-6 col-md-6">	
						<div class="form-group">
							  <label for="nombre" class="col-lg-3 control-label">Nombre del evento</label>
							  <div class="col-md-8">
							  	   {!!Form::text('nombre', $evento->nombre, ['class' => 'form-control','required', 'disabled'=>'true'])!!}
								   <span class="help-block">{{ $errors->first('nombre') }}</span>
							  </div>
						</div>
						<div class="form-group">
							  <label for="lugar" class="col-lg-3 control-label">Lugar</label>
							  <div class="col-md-8">
							  	   {!!Form::text('lugar', $evento->direccion, ['class' => 'form-control','required', 'disabled'=>'true'])!!}
								   <span class="help-block">{{ $errors->first('lugar') }}</span>
							  </div>
						</div>
						<div class="form-group">
							 {!!Form::label('Fecha','',array('class'=>'col-lg-3 control-label'))!!}
							 <div class="col-lg-8">
								 {!! Form::input('date','fecha',$evento->fecha, ['date_format' => 'yyyy-mm-dd', 'disabled'=>'true']) !!}
							 </div>
						</div>	
						<div class="form-group">
							{!!Form::label('Hora','',array('class'=>'col-lg-3 control-label'))!!}
							<div class="col-lg-8">
								{!! Form::input('time', 'hora',$evento->hora,['time_format' => 'HH:mm:ss', 'disabled'=>'true']) !!}
							</div>
						</div>	
						<div class="form-group">
							<label for="descripcion" class="col-lg-3 control-label">Descripción del evento</label>
							<div class="col-md-8">
							    {!!Form::textarea('descripcion', $evento->descripcion, ['class' => 'form-control','required', 'disabled'=>'true'])!!}
							    <span class="help-block">{{ $errors->first('descripcion') }}</span>
							</div>
						</div>
				     </div> 
					 <div class="col-sm-6 col-md-6" disabled="true">	
						<!-- GMAPS -->
						<div  class="form-group">
							 <label class="col-lg-3 control-label"></label>
						     <div class="col-md-6 float-right" >
						  		 <p><strong>Ubicación del evento</p></strong> 				   
						  	 </div>
						  	 {!!Form::text('lat', $evento->latitud,['class'=>'form-control', 'id'=>'lat','TYPE'=>'text','style'=>"display: none" ])!!}
	                         {!!Form::text('long', $evento->longitud,['class'=>'form-control', 'id'=>'long','TYPE'=>'text','style'=>"display: none" ])!!}
						     @include('includes.eventos.mapaInvitado') 
						</div>
					</DIV>
				   {!!Form::close()!!}
				   </div>
			  </fieldset>
			  <br><br><br>
		      <!-- lista de Invitados -->
		      <fieldset id='invitados'>
			      	<legend>Lista de Invitados</legend>
				    <table class="table table-striped table-hover ">
						<thead>
						    <tr>
						      <th>Nombre</th>
						      <th>Notificado</th>
						      <th>Asistirá</th>
							  <th></th>
							  <th></th>
						    </tr>
						</thead>
						<tbody>
							<tr>
								<?php 	
									$organizadorID=$evento->creador;
									$organizador=\App\Usuario::find($organizadorID);
								?>
								<td>{{ $organizador->username }} (organizador)</td><!-- NOMBRE -->
								<td><span class="glyphicon glyphicon-ok"></td><!-- NOTIFICADO -->
								<td><span class="glyphicon glyphicon-ok"></td><!-- ASISTIRA: 	SI -->
							</tr>
							@foreach($invitados as $invitado)
						 	  <tr>
						 	  	 <?php $invitadoName=\App\Usuario::find($invitado->idusuario)?>
								 <td>{{ $invitadoName->username }}</td>
								 <td><span class="glyphicon glyphicon-ok"></td>
								 @if ($invitado->confirmado==1)<!-- ASISTIRA: 	SI -->
								    <td><span class="glyphicon glyphicon-ok"></td>
								 @endif
								 @if ($invitado->confirmado==2)<!-- ASISTIRA: NO -->
								   <td><span class="glyphicon glyphicon-remove"></td>
						 		 @endif
								 @if ($invitado->confirmado==0)<!-- ASISTIRA: NO SE -->
								   <td><span class="glyphicon glyphicon-question-sign"></td>
								 @endif
							     <td></td>
							  	 <td></td>
							  </tr>		
						    @endforeach   
						</tbody>
				    </table>
			  </fieldset> 
			  <br><br>
			  <!-- lista de Compras -->
			  <fieldset id='compras' >
			  		<legend>Lista de Compras</legend>
			  		<table class="table table-striped table-hover ">
						<thead>
						   <tr>
						       <th>Qué hace falta?</th>
						       <th>Quien trae?</th>
						       <th>Cuántos hay?</th> <!-- cuantos lleva el invita -->
						       <th>Faltan</th><!--  contador - cantidad pedida -->
						   </tr>
						</thead>
						<tbody>
						     @foreach($items as $item) 
							   <tr>
							      <td> {{ $item->nombre }} </td>
							      <td>
							      	<?php $cantItem=0;?>
							       @foreach($itemsOK as $itemok)   
							       	    @if($itemok->iditem == $item->id)
							       	    	<?php $nombreUsuario=\App\Usuario::find($itemok->idusuario)?>
							       	    	<div>
												<a href="" class="btn btn-primary pull-right" >{{$nombreUsuario->username}} <span class="badge ">({{$itemok->cantidad}})</span></a> 
											</div>
											<?php $cantItem=$cantItem+($itemok->cantidad)?>                               
							       	    @endif 
							       @endforeach    
							      </td>
							      <td> {{$cantItem}}/{{$item->cantidad}} </td>
							      <td> {{$item->cantidad -$cantItem}}</td>
							   </tr>
							 @endforeach
						</tbody>
					</table> 
			  </fieldset>  <br><br>
			  <!-- FOTOS DEL EVENTO -->
			  <fieldset id='fotos' >
				  <legend>Recuerdos</legend>
				  <div class="row">
				     @foreach($fotos as $foto)
				        <div class="col-sm-2">
				           <div class="thumbnail">
				              <div class="panel-body">
				                <a href="{{ route('upfotos.destroy', $foto->id) }}" class="btn btn-danger pull-right" ><span class="glyphicon glyphicon-remove-circle"></span></a> 
				                <a href="\..\..\{{$foto->photo}}"><img src="\..\..\{{$foto->photo}}" height='100' width='100'> </a>
				              </div>
				           </div>
				        </div>
				      @endforeach
				  </div>
				  {!!Form::open(['route'=>'upfotos.store', 'method' => 'POST', 'files'=>'true', 'class' => 'form-horizontal'])!!}
				     <div class="form-group">
					    <label class="control-label">Agregar foto</label>
					    <div class="input-group">
					       <td>
						     <input type="file" name="file" class="form-control"> 
						     {!!Form::submit('Subir',['id'=>'subirfoto','class' => 'btn btn-primary'])!!}
						   </td>
					    </div>
					 </div>
					 {!!Form::text('eventoid',$evento->id,['class'=>'form-control', 'id'=>'eventoid','TYPE'=>'text' ,'style'=>"display: none"])!!}
				  {!!Form::close()!!}
				 <br><br><br>
			  </fieldset>
		</div>
	@endif
@endsection
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0x2gX3yarU-p7rLGjj7JUVBpxgSdmInk"></script>