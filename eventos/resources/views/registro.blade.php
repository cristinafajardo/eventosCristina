@extends('admin.template.layout')
@section('title')
    Registrarse
@endsection
@section('content')
<div class="container">
	<form class="form-horizontal">
	  <fieldset>
	    <legend>Registro</legend>
	    <div class="form-group">
		  <label for="usr" class="col-lg-2 control-label">Nombre</label>
		  <div class="col-md-10">
		  	  <input type="text" class="form-control" id="usr" placeholder="Nombre">
		  </div>
		</div>
	    <div class="form-group">
	      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
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
	      <label class="col-lg-2 control-label">Sexo</label>
	      <div class="col-lg-10">
	        <div class="radio">
	          <label>
	            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
	            F
	          </label>
	        </div>
	        <div class="radio">
	          <label>
	            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
	            M
	          </label>
	        </div>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="select" class="col-lg-2 control-label">Provincia</label>
	      <div class="col-lg-10">
		        <select class="form-control" id="select">
		          <option>Buenos Aires</option>
		          <option>Catamarca</option>
		          <option>Chaco</option>
		          <option>Chubut</option>
		          <option>Córdoba</option>
		          <option>Corrientes</option>
		          <option>Entre Ríos</option>
		          <option>Formosa</option>
		          <option>Jujuy</option>
		          <option>La Pampa</option>
		          <option>La Rioja</option>
		          <option>Mendoza</option>
		          <option>Misiones</option>
		          <option>Neuquén</option>
		          <option>Río Negro</option>
		          <option>Salta</option>
		          <option>San Juan</option>
		          <option>San Luis</option>
		          <option>Santa Cruz</option>
		          <option>Santa Fe</option>
		          <option>Santiago del Estero</option>
		          <option>Tierra del Fuego</option>
		          <option>Tucumán</option>
		        </select>
	      </div>
	    </div>
	    <div class="form-group">
			<label for="usr" class="col-lg-2 control-label">Ciudad</label>
			<div class="col-md-10">
			 	<input type="text" class="form-control" id="usr" placeholder="Ciudad">
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
	            		<input type="checkbox"> Acepto Términos y Condiciones de uso
	          		</label>
	        	</div>
	      </div>
	   </div>
		<div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	        <button type="reset" class="btn btn-default">Cancelar</button>
	        <button type="submit" class="btn btn-primary">Registrarme</button>
	      </div>
	    </div>
	  </fieldset>
	</form>
</div>
@endsection