@extends('admin.template.layout')
@section('title')
    Login
@endsection
@section('content')
<div class="container">
	 {!!Form::open(['method' => 'POST', 'url' => 'login', 'role' => 'form'])!!}
		  <fieldset>
			    <legend>Iniciar sesión</legend>
			    @if($errors->any())
                Datos incorrectos
                @endif
			    <div class="form-group">
			      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
			      <div class="col-md-10">
			         {!!Form::text('Email', '', array('class' => 'form-control'))!!}
			         <span class="help-block">{{ $errors->first('Email') }}</span>
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="inputPassword" class="col-lg-2 control-label">Contraseña</label>
			      <div class="col-lg-10">
 						{!!Form::password('password', array('class' => 'form-control'))!!}
                  		<span class="help-block">{!! $errors->first('password') !!}</span>
			      </div>
			    </div>
			    <div class="form-group">
			      <div class="col-lg-10 col-lg-offset-2">
			        <button type="submit" class="btn btn-primary" name="btnLogin">Entrar</button>
			      </div>
			    </div>
			    <div class="form-group">
			    	<div class="pull-right">
						<a href="#" class="btn btn-default" name="btnOlvidePass">Olvide la contraseña</a>
	                    <a href="{{ url('registro') }}" class="btn btn-primary" name="btnRegistrarme">Registrarme</a>
                    </div>
			    </div>
		  </fieldset>
		  {!!Form::close()!!}
	
</div>   
@endsection