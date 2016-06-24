@extends('admin.template.layout')
@section('title')
    Contacto
@endsection
@section('content')
{!!Form::open(['method' => 'POST', 'url' => 'login', 'role' => 'form'])!!}
	  <fieldset>
		    <legend>Contact Us</legend>
		    @if($errors->any())
                Datos incorrectos
                @endif
		    <div class="form-group">
				  <label for="usr" class="col-lg-2 control-label">Nombre</label>
				  <div class="col-md-10">
				  	 {!!Form::text('nombre', '', array('class' => 'form-control'))!!}
			         <span class="help-block">{{ $errors->first('nombre') }}</span>
				  </div>
			</div>
			<div class="form-group">
		      <label for="Email" class="col-lg-2 control-label">Email</label>
		      <div class="col-md-10">
		         {!!Form::text('Email', '', array('class' => 'form-control'))!!}
			     <span class="help-block">{{ $errors->first('Email') }}</span>
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="textArea" class="col-lg-2 control-label">Consulta</label>
		      <div class="col-md-10">
		       {!!Form::textarea('consulta', '', array('class' => 'form-control'))!!}
			     <span class="help-block">{{ $errors->first('consulta') }}</span>
		      </div>
		    </div>
		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <button type="reset" class="btn btn-default">Cancelar</button>
		        <button type="submit" class="btn btn-primary">Enviar</button>
		      </div>
		    </div>
	  </fieldset>
 {!!Form::close()!!}
@endsection




   