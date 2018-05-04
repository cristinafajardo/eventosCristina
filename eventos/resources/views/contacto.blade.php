@extends('admin.template.layout')
@section('title')
    Contacto
@endsection
@section('content')
{!!Form::open(['route'=>'mail.store','method' => 'POST'])!!}
	  <fieldset>
		    <legend>Contact Us</legend>
		   @if($errors->any())
                Datos incorrectos
           @endif
		    <div class="form-group">
				  <label for="nombre" class="col-lg-2 control-label">Nombre</label>
				  <div class="col-md-10">
				  	 {!!Form::text('name', null, array('class' => 'form-control','required'))!!}
		             <span class="help-block">{{ $errors->first('nombre') }}</span>
				  </div>
			</div><br>
			<div class="form-group">
		      <label for="Email" class="col-lg-2 control-label">Email</label>
		      <div class="col-md-10">
		         {!!Form::text('email', null, array('class' => 'form-control','required'))!!}
 			     <span class="help-block">{{ $errors->first('Email') }}</span>
 		      </div>
		    </div><br>
		    <div class="form-group">
		      <label for="consulta" class="col-lg-2 control-label">Consulta</label>
		      <div class="col-md-10">
		         {!!Form::textarea('mensaje', null, array('class' => 'form-control','required'))!!}
 			     <span class="help-block">{{ $errors->first('consulta') }}</span>
 		      </div>
		    </div><br>
		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        {!!Form::submit('Enviar', array('class'=>'btn btn-primary')) !!}
		        <button type="reset" class="btn btn-default">Cancelar</button>
		       <!--  <button type="submit" class="btn btn-primary">Enviar</button> -->
		      </div>
		    </div>
	  </fieldset>
 {!!Form::close()!!}
@endsection
<!-- eventos.cristina.16@gmail.com -->