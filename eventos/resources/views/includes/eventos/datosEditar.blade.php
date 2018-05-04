{!!Form::open(['route'=> ['misEventos.update',$evento], 'method' => 'PUT', 'class' => 'form-horizontal'])!!}
	<div class="form-group">
	  <label for="nombre" class="col-lg-2 control-label">Nombre del evento</label>
	  <div class="col-md-10">
	  	   {!!Form::text('nombre', $evento->nombre, ['class' => 'form-control','required'])!!}
		   <span class="help-block">{{ $errors->first('nombre') }}</span>
	  </div>
	</div>
	<div class="form-group">
	  <label for="lugar" class="col-lg-2 control-label">Lugar</label>
	  <div class="col-md-10">
	  	   {!!Form::text('lugar', $evento->direccion, ['class' => 'form-control','required'])!!}
		   <span class="help-block">{{ $errors->first('lugar') }}</span>
	  </div>
	</div>
	<div class="form-group">
		{!!Form::label('Fecha','',array('class'=>'col-lg-2 control-label'))!!}
		<div class="col-lg-10">
			{!! Form::input('date','fecha',$evento->fecha, ['date_format' => 'yyyy-mm-dd']) !!}
		</div>
	</div>	
	<div class="form-group">
		{!!Form::label('Hora','',array('class'=>'col-lg-2 control-label'))!!}
		<div class="col-lg-10">
			{!! Form::input('time', 'hora',$evento->hora,['time_format' => 'HH:mm:ss']) !!}
		</div>
	</div>	
	<div class="form-group">
	  <label for="descripcion" class="col-lg-2 control-label">Descripción del evento</label>
	  <div class="col-md-10">
	  	   {!!Form::textarea('descripcion', $evento->descripcion, ['class' => 'form-control','required'])!!}
		   <span class="help-block">{{ $errors->first('descripcion') }}</span>
	  </div>
	</div>
	<!-- GMAPS -->
	<div  class="form-group">
	  <label class="col-lg-2 control-label"></label>
	  <div class="col-md-10">
	  	  <p><strong>Ubicación del evento</p></strong> 				   
	  </div>
	   {!!Form::text('lat', $evento->latitud,['class'=>'form-control', 'id'=>'lat','TYPE'=>'text','style'=>"display: none"   ])!!}
	   {!!Form::text('long', $evento->longitud,['class'=>'form-control', 'id'=>'long','TYPE'=>'text','style'=>"display: none"  ])!!}
	   @include('includes.eventos.mapaEjemploVerEvento') 

	</div>
	<br> <br>
	<div class="form-group">
	   <label for="descripcion" class="col-lg-2 control-label">Por mi parte somos:</label>
       <div class="col-md-1"></div>
	  <label for="mayores" class="col-lg-2 control-label">Adultos</label>
	  <div class="col-md-2">
	  	   {!!Form::number('mayores',  $evento->adultos_organizador, ['class' => 'form-control','required', 'min'=>'0'])!!}
		   <span class="help-block">{{ $errors->first('descripcion') }}</span>
	  </div>
	  <label for="menores" class="col-lg-2 control-label">Niños</label>
	  <div class="col-md-2">
	  	   {!!Form::number('menores',  $evento->niños_organizador, ['class' => 'form-control','required', 'min'=>'0'])!!}
		   <span class="help-block">{{ $errors->first('descripcion') }}</span>
	  </div>
	</div>
	<div class="form-group">
	  <div class="col-lg-10 col-lg-offset-2">
	    {!!Form::submit('Guardar',['id'=>'editarEvento','class' => 'btn btn-primary'])!!}
	  </div>
	</div>
 {!!Form::close()!!}