@extends('admin.template.layout')
@section('title')
    Confirmación de Registro
@endsection
@section('content')
<fieldset>
	<legend>Confirmacion de registro</legend>
	<div class="jumbotron">
			<br>
            <p>Te registraste correctamente. Enviamos un correo de confirmación a tu cuenta de correo electrónico </p> 
            <br><br>
            {!!Form::open(['method' => 'POST', 'url' => 'login', 'role' => 'form'])!!}
            	<div class="form-group">
            	  <div class="col-lg-10 col-lg-offset-2">
			        <a href="{{ url('login') }}" class="btn btn-primary navbar-right" name="btnRegistrarme">Ingresar a mi cuenta</a>
			      </div>
			    </div>
            {!!Form::close() !!}
	</div>
</fieldset>
@endsection