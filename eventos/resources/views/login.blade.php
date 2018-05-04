@extends('admin.template.layout')
@section('title')
    Login
@endsection
@section('content')
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<div class="container">
	 {!!Form::open(['method' => 'POST', 'url' => 'login', 'role' => 'form'])!!}
	 @if(Session::has('registro'))
		<h3>{{Session::get('registro')}}</h3></br>
	@endif
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
						<a href="#" class="btn btn-default" name="btnOlvidePass" data-toggle='modal' data-target='#popupPassword'>Olvide la contraseña</a>
						<div class="modal" id='popupPassword' role='dialog'>
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title">Recuperar Contraseña</h4>
						      </div>
						      <div class="modal-body">
						        	{!!Form::open(array('method' => 'POST', 'url' => '/passwordPop', 'role' => 'form'))!!}
											<p>aca va el body de recuperacion de password</p>
											<!-- <div class "row">
												<div class="col-xs-6">
													<div class="input-group" >
															{!!Form::label('Nombre del Item')!!}
															{!!Form::text('nombre','',array('class'=>'form-control'))!!} 
													</div>
												</div>
											</div> <br><br><br><br>
											<div class "row">
												<div class="col-xs-6">
													<div class="input-group" >
															{!!Form::label('Cantidad')!!}
															{!!Form::input('number','cantidad')!!} 
													</div>
												</div>
											</div>
											</br> -->
											
									{!!Form::close()!!}
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						        <button type="button" class="btn btn-primary">Recuperar</button>
						      </div>
						    </div>
						  </div>
						</div>
	                    <a href="{{ url('registro') }}" class="btn btn-primary" name="btnRegistrarme">Registrarme</a>
                    </div>
			    </div>
		  </fieldset>
		  {!!Form::close()!!}
</div>   
@endsection