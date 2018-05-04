@extends('admin.template.layout')
@section('title')
    Modificar Datos
@endsection
@section('content')
<div class="container"><!--  -->

	{!!Form::open(['route'=> ['perfil.update',$usuario], 'method' => 'PUT', 'class' => 'form-horizontal'])!!}
	  <fieldset>
	    <legend>Modificar Datos</legend>
	      <div class="form-group">
		  <label for="username" class="col-lg-2 control-label">Nombre</label>
		  <div class="col-md-10">
		  	   {!!Form::text('username', $usuario->username, ['class' => 'form-control','required'])!!}
			   <span class="help-block">{{ $errors->first('username') }}</span>
		  </div>
		</div>
		<div class="form-group">
		  <label for="apellido" class="col-lg-2 control-label">Apellido</label>
		  <div class="col-md-10">
		  	   {!!Form::text('apellido', $usuario->apellido, ['class' => 'form-control','required'])!!}
			    <span class="help-block">{{ $errors->first('apellido') }}</span>
		  </div>
		</div>
	    <div class="form-group">
	      <label for="email" class="col-lg-2 control-label">Email</label>
	      <div class="col-lg-10">
	         {!!Form::email('email', $usuario->email, ['class' => 'form-control','placeholder'=>'example@mail.com','required'])!!}
			 <span class="help-block">{{ $errors->first('email') }}</span>
	      </div>
	    </div>
	    <div class="form-group">
	     	{!!Form::label('Fecha de nacimiento','',array('class'=>'col-lg-2 control-label'))!!}
			<div class="col-lg-10">
				{!! Form::input('date','fecha',$usuario->nacimiento,array( 'date_format' => 'yyyy-mm-dd')) !!}
			</div>
		</div>  
	    <div class="form-group">
	      	<label for="provincias" class="col-lg-2 control-label">Provincia</label>
	      	<div class="col-md-10">
		      	{!! Form::select('provincia', ['bs as' => 'Buenos Aires', 
		      	'catamarca'=>'Catamarca','chaco'=>'Chaco', 'chubut'=>'Chubut', 
		      	'cordoba'=>'Córdoba', 'corrientes'=>'Corrientes','entre rios' =>'Entre Ríos',
				'formosa'=>'Formosa', 'jujuy'=>'Jujuy', 'la pampa'=>'La Pampa',
				'la rioja'=>'La Rioja', 'mendoza'=>'Mendoza', 'misiones'=>'Misiones',
				'neuquen'=>'Neuquén', 'rio negro'=>'Río Negro', 'salta'=>'Salta',
				'san juan'=>'San Juan', 'san luis'=>'San Luis', 'santa cruz'=>'Santa Cruz',
				'santa fe'=>'Santa Fe',	'santiago del estero'=>'Santiago del Estero',
				'tierra del fuego'=>'Tierra del Fuego', 'tucuman'=>'Tucumán'],$usuario->provincia, ['class'=>'form-control'] ) !!}
			</div>
	    </div> 
	    <div class="form-group">
			<label for="ciudad" class="col-lg-2 control-label">Ciudad</label>
			<div class="col-md-10">
			 	 {!!Form::text('ciudad', $usuario->ciudad,['class' => 'form-control','required'])!!}
			     <span class="help-block">{{ $errors->first('ciudad') }}</span>
			</div>
		</div>
		 <div class="form-group">
	      <label for="pass" class="col-lg-2 control-label">Contraseña</label>
	      <div class="col-lg-10">
	         {!!Form::password('pass',['class' => 'form-control','required'])!!}
			 <span class="help-block">{{ $errors->first('email') }}</span>
	      </div>
	    </div>
	     <div class="form-group">
	      <label for="confpass" class="col-lg-2 control-label">Confirma Contraseña</label>
	      <div class="col-lg-10">
	         {!!Form::password('confpass',['class' => 'form-control','required'])!!}
			 <span class="help-block">{{ $errors->first('email') }}</span>
	      </div>
	    </div>		
		<div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	      	<a href="{{ route('perfil.verPerfil', $usuario) }}" class="btn btn-default">Cancelar</a>
	       <!--  <button type="reset" class="btn btn-default">Cancelar</button> -->
	       {!!Form::submit('Guardar',['id'=>'editarPerfil','class' => 'btn btn-primary'])!!}
	      </div>
	    </div>
	    <br><br><br>
	  </fieldset>
 {!!Form::close()!!}
</div>
@endsection