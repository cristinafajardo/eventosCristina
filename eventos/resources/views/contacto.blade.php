@extends('admin.template.main')

<h1>ESTO ES "CONTACTO"</h1>
<form class="form-horizontal">
	  <fieldset>
		    <legend>Contact Us</legend>
		    <div class="form-group">
				  <label for="usr" class="col-lg-2 control-label">Nombre</label>
				  <div class="col-md-10">
				  	<input type="text" class="form-control" id="usr" placeholder="Nombre">
				  </div>
			</div>
			<div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
		      <div class="col-md-10">
		        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="textArea" class="col-lg-2 control-label">Consulta</label>
		      <div class="col-md-10">
		        <textarea class="form-control" rows="3" id="textArea"></textarea>
		        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
		      </div>
		    </div>
		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <button type="reset" class="btn btn-default">Cancelar</button>
		        <button type="submit" class="btn btn-primary">Enviar</button>
		      </div>
		    </div>
	  </fieldset>
</form>






   