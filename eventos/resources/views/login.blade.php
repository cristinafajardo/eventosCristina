@extends('admin.template.main')

<h1>ESTO ES "login"</h1>
<form class="form-horizontal">
	  <fieldset>
		    <legend>Login</legend>
		    <div class="form-group">
		      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
		      <div class="col-md-10">
		        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
		      <div class="col-lg-10">
		        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
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
   