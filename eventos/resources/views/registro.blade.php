@extends('admin.template.layout')
@section('title')
    Registrarse
@endsection
@section('content')
<div class="container"><!-- 'url' => 'login', 'role' => 'form', -->
	{!!Form::open(['route'=>'admin.usuarios.store','method' => 'POST', 'class' => 'form-horizontal'])!!}
	  <fieldset>
	    <legend>Registrarme</legend>
	   <!--  @if($errors->any())
                Datos incorrectos
        @endif -->
	    <div class="form-group">
		  <label for="username" class="col-lg-2 control-label">Nombre</label>
		  <div class="col-md-10">
		  	   {!!Form::text('username', '', ['class' => 'form-control','required'])!!}
			   <span class="help-block">{{ $errors->first('username') }}</span>
		  </div>
		</div>
		<div class="form-group">
		  <label for="apellido" class="col-lg-2 control-label">Apellido</label>
		  <div class="col-md-10">
		  	   {!!Form::text('apellido', '', ['class' => 'form-control','required'])!!}
			         <span class="help-block">{{ $errors->first('apellido') }}</span>
		  </div>
		</div>
	    <div class="form-group">
	      <label for="email" class="col-lg-2 control-label">Email</label>
	      <div class="col-lg-10">
	         {!!Form::email('email', '', ['class' => 'form-control','placeholder'=>'example@mail.com','required'])!!}
			 <span class="help-block">{{ $errors->first('email') }}</span>
	      </div>
	    </div>
	    <div class="form-group">
	     	<label for="inputDate" class="col-lg-2 control-label">Fecha de Nacimiento</label>
	          <div class="col-lg-10">
			     <div class="input-append date form_datetime" id="inputDate">
				    <input size="16" type="text" value="" readonly>
				    <span class="add-on"><i class="icon-th"></i></span>
				 </div>
			   </div>
			   <!--<script type="text/javascript">
				    $(".form_datetime").datetimepicker({
				        format: "dd MM yyyy - hh:ii"
				    });
				</script>-->
		</div>  
	    <div class="form-group">
	    	<label for="sexo" class="col-lg-2 control-label">Sexo</label>
		   <div class="col-lg-10">
		       {!!Form::label('sexo', 'Femenino')!!}
               {!!Form::radio('sexo', 'femenino', true)!!}           
               {!!Form::label('sexo', 'Masculino')!!}                      
               {!!Form::radio('sexo', 'masculino')!!}
	      </div>
	    </div>
	    <div class="form-group">
	      	<label for="provincias" class="col-lg-2 control-label">Provincia</label>
	      	<div class="col-md-10">
		      	{!! Form::select('provincia', ['bs as' => 'Buenos Aires', 
		      	'catamarca'=>'Catamarca',
		      	'chaco'=>'Chaco', 
		      	'chubut'=>'Chubut', 
		      	'cordoba'=>'Córdoba', 
		      	'corrientes'=>'Corrientes',
				'entre rios' =>'Entre Ríos',
				'formosa'=>'Formosa',
				'jujuy'=>'Jujuy',
				'la pampa'=>'La Pampa',
				'la rioja'=>'La Rioja',
				'mendoza'=>'Mendoza',
				'misiones'=>'Misiones',
				'neuquen'=>'Neuquén',
				'rio negro'=>'Río Negro',
				'salta'=>'Salta',
				'san juan'=>'San Juan',
				'san luis'=>'San Luis',
				'santa cruz'=>'Santa Cruz',
				'santa fe'=>'Santa Fe',
				'santiago del estero'=>'Santiago del Estero',
				'tierra del fuego'=>'Tierra del Fuego',
				'tucuman'=>'Tucumán'], null, ['class'=>'form-control'] ) !!}
			</div>
	    </div> 
	    <div class="form-group">
			<label for="ciudad" class="col-lg-2 control-label">Ciudad</label>
			<div class="col-md-10">
			 	    {!!Form::text('ciudad', '',['class' => 'form-control','required'])!!}
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
	         {!!Form::password('confpass', ['class' => 'form-control','required'])!!}
			 <span class="help-block">{{ $errors->first('email') }}</span>
	      </div>
	    </div>
		<div class="form-group">
	      <label for="textArea" class="col-lg-2 control-label">Términos y Condiciones de uso</label>
	      <div class="col-lg-10">
		        <textarea class="form-control" rows="3" id="textArea" readonly>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent facilisis egestas tortor et interdum. Nunc condimentum urna gravida, tincidunt augue ut, facilisis sapien. Maecenas posuere, felis vel ornare ultrices, metus nisi rutrum arcu, ac lacinia urna dui eget sem. Nulla orci lectus, laoreet at diam a, tempor blandit est. Aenean lobortis in lectus venenatis consequat. Mauris euismod ut turpis nec commodo. Phasellus mattis id odio eu euismod. Sed orci sem, aliquet cursus sem sed, convallis congue quam. In in leo aliquam, consequat urna sit amet, interdum arcu. Maecenas fermentum fermentum tellus id vestibulum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi iaculis ullamcorper felis a congue. Nulla pretium auctor ex in aliquam. Aenean efficitur mauris ac felis molestie, bibendum varius felis laoreet. Phasellus fringilla mauris non lacus viverra, at commodo magna ullamcorper.
				Phasellus sit amet lectus vitae justo finibus suscipit sed eu lectus. Aenean mattis lobortis dolor sit amet sagittis. Ut volutpat sapien et turpis placerat sollicitudin. Pellentesque in odio nec tortor tincidunt bibendum. Duis posuere ultrices dui vel ultricies. Nullam tristique risus sit amet nulla porta dapibus. Pellentesque non gravida urna. Cras vestibulum facilisis mi in lacinia. Sed in felis ipsum. Morbi at ullamcorper tortor, et placerat risus.
				</textarea>
	      		<div class="checkbox">
	      			<label>
	            		{!!Form::checkbox('ok', 'ok', '')!!}  Acepto Terminos y Condiciones de uso
	          		</label>
				</div>
	      </div>
	   </div>
		<div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	        <button type="reset" class="btn btn-default">Cancelar</button>
	       {!!Form::submit('Registrarme',['id'=>'Registrarme','class' => 'btn btn-primary'])!!}
	      </div>
	    </div>
	    <br><br><br>
	  </fieldset>
 {!!Form::close()!!}
</div>
@endsection