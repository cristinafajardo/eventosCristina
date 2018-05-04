<div class="form-group">
  <label for="nombre" class="col-lg-2 control-label">Nombre del evento</label>
  <div class="col-md-10">
  	   {!!Form::text('nombre','', ['class' => 'form-control','required'])!!}
	   <span class="help-block">{{ $errors->first('nombre') }}</span>
  </div>
</div>
<div class="form-group">
  <label for="lugar" class="col-lg-2 control-label">Lugar</label>
  <div class="col-md-10">
  	   {!!Form::text('lugar', '', ['class' => 'form-control','required'])!!}
	   <span class="help-block">{{ $errors->first('lugar') }}</span>
  </div>
</div>
<div class="form-group">
	{!!Form::label('Fecha','',array('class'=>'col-lg-2 control-label'))!!}
	<div class="col-lg-10">
		{!! Form::input('date','fecha','',array( 'date_format' => 'yyyy-mm-dd')) !!}
    </div>
</div>	
<div class="form-group">
	{!!Form::label('Hora','',array('class'=>'col-lg-2 control-label'))!!}
	<div class="col-lg-10">
		{!! Form::input('time', 'hora','',array( 'time_format' => 'HH:mm:ss')) !!}
	</div>
</div>	
<div class="form-group">
	<label for="descripcion" class="col-lg-2 control-label">Descripción del evento</label>
  <div class="col-md-10">
  	   {!!Form::textarea('descripcion', '', ['class' => 'form-control','required'])!!}
	   <span class="help-block">{{ $errors->first('descripcion') }}</span>
  </div>
</div>