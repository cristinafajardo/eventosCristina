@extends('admin.template.layout')
@section('title')
    Login
@endsection
@section('content')
<div class="container">
	<form class="form-horizontal" method='post' action='/login' >
		  <fieldset>
			    <legend>Iniciar sesión</legend>
			    <div class="form-group">
			      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
			      <div class="col-md-10">
			        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="inputPassword" class="col-lg-2 control-label">Contraseña</label>
			      <div class="col-lg-10">
			        <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña">
			      </div>
			    </div>
			    <div class="form-group">
			      <div class="col-lg-10 col-lg-offset-2">
			        <button type="submit" class="btn btn-primary">Entrar</button>
			      </div>
			    </div>
			    <div class="form-group">
			    	<div class="pull-right">
						<a href="#" class="btn btn-default">Olvide la contraseña</a>
	                    <a href="#" class="btn btn-primary">Registrarme</a>
                    </div>
			    </div>
		  </fieldset>
	</form>
</div>   
@endsection