@extends('admin.template.layout')
@section('title')
   Organizar Evento
@endsection
@section('content')
<h1>Nuevo evento</h1>
<div class="container">
	<form class="form-horizontal">
       <fieldset>
          <legend>Datos evento</legend>
          <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
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
		     <label for="textArea" class="col-lg-2 control-label">Textarea</label>
		     <div class="col-lg-10">
		       <textarea class="form-control" rows="3" id="textArea"></textarea>
		       <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
		     </div>
		  </div>
       </fieldset>
       <fieldset>
		  <legend>Mensajes/log de actividades</legend>
		  <div class="container">
			 <div class="form-group">
			      <label for="textArea" class="col-lg-2 control-label">Textarea</label>
			      <div class="col-lg-10">
			        <textarea class="form-control" rows="3" id="textArea"></textarea>
			        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
			      </div>
		     </div>
		     <div class="form-group">
			 	 <label class="control-label">Input addons</label>
			 	 <div class="input-group">
				    <span class="input-group-addon">$</span>
				    <input type="text" class="form-control">
				    <span class="input-group-btn">
			      		<button class="btn btn-default" type="button">Button</button>
			    	</span>
			  	 </div>
			 </div>
		  </div>
       </fieldset>
  <fieldset>
  		<legend>Invitados</legend>
  		<div class="checkbox">
          <label>
            <input type="checkbox"> Lista cerrada
          </label>
        </div>
  		<ul class="nav navbar-right">  
  			<a href="#" class="btn btn-warning">Agregar invitado +</a><br><br><br>
		</ul>
  		<table class="table table-striped table-hover ">
 			 <thead>
			    <tr>
			      <th>Nombre</th>
			      <th>Notificado</th>
			      <th>Asistira</th>
			      <th>Adultos</th>
			      <th>Niños</th>
			      <th>Costo</th>
			      <th>Gastos</th>
			      <th>Balance</th>
			      <th>$ ok</th>
			      <th>Acciones</th>
			    </tr>
  			</thead>
  			<tbody>
			   <tr>
			      <td>- </td>
			      <td>- </td>
			      <td>- </td>
			      <td>- </td>
			      <td>- </td>
			      <td> -</td>
			      <td>- </td>
			      <td>- </td>
			      <td>- </td>
			      <td> -</td>
			    </tr>
			    <tr class="warning">
			      <td>- </td>
			      <td>- </td>
			      <td>- </td>
			      <td>- </td>
			      <td> -</td>
			      <td>- </td>
			      <td>- </td>
			      <td>- </td>
			      <td>- </td>
			      <td>- </td>
			    </tr>
		    </tbody>
		</table> 
		<a href="#" class="btn btn-default">Enviar invitación a no notificados</a>
		<a href="#" class="btn btn-primary">Reenviar invitación a no confirmados</a>
		<a href="#" class="btn btn-success">Enviar cuentas a asistentes</a>
  </fieldset>
  <fieldset>
  		<legend>Cuentas</legend>
  		<div class="form-group">
     		<div class="col-lg-10">
		        <div class="radio">
			          <label>
			            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
			            el organizador invita
			          </label>
		        </div>
       			<div class="radio">
		          	<label>
			            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
			            se establece un valor fijo
			        </label>
		        </div>
		        <div class="radio">
		          	<label>
			            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
			            se establece un valor fijo por asistente
			        </label>
		        </div>
		        <div class="radio">
		          	<label>
			            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
			            se divide lo gastado en partes iguales
			        </label>
		        </div>
		        <div class="radio">
		          	<label>
			            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
			            se divide lo gastado segun asistentes
			        </label>
		        </div>
		        <div class="radio">
		          	<label>
			            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
			            se divide un valor arbitrario en partes iguales
			        </label>
		        </div>
		        <div class="radio">
		          	<label>
			            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
			            se divide un valor arbitrario segun asistentes
			        </label>
		        </div>
     		</div>
   		</div>
  </fieldset>
  <fieldset>
  		<legend>Lista de compras</legend>
  		<ul class="nav navbar-right">  
 			<a href="#" class="btn btn-warning">Agregar item +</a><br><br>
		</ul>
  		<table class="table table-striped table-hover ">
			  <thead>
			     <tr>
			       <th>que hace falta?</th>
			       <th>quien trae?</th>
			       <th>cuantos?</th>
			       <th>faltan</th>
			       <th>acciones</th>
			     </tr>
			  </thead>
			  <tbody>
				   <tr>
				      <td>- </td>
				      <td>- </td>
				      <td>- </td>
				      <td> -</td>
				      <td>- </td>
				    </tr>
				    <tr class="warning">
				      <td>- </td>
				      <td>- </td>
				      <td>- </td>
				      <td>- </td>
				      <td>- </td>
				    </tr>
			  </tbody>
		</table> 
		<a href="#" class="btn btn-default">Enviar lista de compras</a>
  </fieldset>
  <fieldset>
  		<legend>Fotos</legend>
  		<div id="links">
		    <a href="{{ asset('fb.jpg') }}"title="Banana" data-gallery>
		        <img src="{{ asset('img/fb.jpg') }}">
		    <a href="{{ asset('inst.jpg') }}" title="Apple" data-gallery>
		        <img src="{{ asset('img/inst.jpg') }}" alt="Apple">
		    </a>
		    <a href="{{ asset('tw.jpg') }}" title="Orange" data-gallery>
		        <img src="{{ asset('img/tw.jpg') }}" alt="Orange">
		    </a>
		</div>
  		<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
		<div id="blueimp-gallery" class="blueimp-gallery">
		    <!-- The container for the modal slides -->
		    <div class="slides"></div>
		    <!-- Controls for the borderless lightbox -->
		    <h3 class="title"></h3>
		    <a class="prev">‹</a>
		    <a class="next">›</a>
		    <a class="close">×</a>
		    <a class="play-pause"></a>
		    <ol class="indicator"></ol>
		    <!-- The modal dialog, which will be used to wrap the lightbox content -->
		    <div class="modal fade">
		        <div class="modal-dialog">
		            <div class="modal-content">
		                <div class="modal-header">
		                    <button type="button" class="close" aria-hidden="true">&times;</button>
		                    <h4 class="modal-title"></h4>
		                </div>
		                <div class="modal-body next"></div>
		                <div class="modal-footer">
		                    <button type="button" class="btn btn-default pull-left prev">
		                        <i class="glyphicon glyphicon-chevron-left"></i>
		                        Previous
		                    </button>
		                    <button type="button" class="btn btn-primary next">
		                        Next
		                        <i class="glyphicon glyphicon-chevron-right"></i>
		                    </button>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="form-group">
			  <label class="control-label">Agregar foto</label>
			  <div class="input-group">
				    <input type="text" class="form-control">
				    <span class="input-group-btn">
				    	  <button class="btn btn-default" type="button">Subir</button>
				    </span>
			  </div>
		</div>
        <br><br><br>
  </fieldset>
</form>
</div>
@endsection