<legend>Invitados</legend>
@if ($evento->cerrado==1)
	<div class="panel-inverse panel-danger">
	  <div class="panel-heading"> 
	  	Evento cerrado, no se admiten nuevos invitados
	  </div>
	</div><br>
@else
	<div class="panel-inverse panel-info">
	  <div class="panel-heading"> 
	  	Evento abierto, se admiten nuevos invitados
	  </div>
	</div><br>
	<ul class="nav navbar-right">  
		<a href="app/views/includes/eventos" class="btn btn-info" data-toggle='modal' data-target='#popupNuevoInvitado' id='+invitado'>Agregar invitado +</a><br><br><br>
	</ul>
@endif
<!-- POP UP AGREGAR INVITADOS -->	
<div class="modal" id='popupNuevoInvitado' role='dialog'>
  <div class="modal-dialog">
	    <div class="modal-content">
		      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title">Nuevo Invitado</h4>
		      </div>
		      <div class="modal-body">
		         {!!Form::open(['method' => 'POST', 'url' => '/invitados', 'role' => 'form'])!!}
					  <div class="form-group">
	                     <label for="nombreinvitado" class="col-lg-2 control-label">Nombre: </label> 
	                     <div class="col-lg-8">
	                     	{!!Form::text('nombreinvitado','',['class'=>'form-control col-md-10', 'placeholder'=>'Ej: Spiderman','required'])!!}
	                    	<!--  <input class="form-control col-md-10" id="inputNombre" placeholder="Nombre" type="text" name="nombreinvitado">  -->
	                	 </div><br><br><br>
	                  </div>
					  <div class="form-group">
	                     <label for="mail" class="col-lg-2 control-label">Email:</label>
	                     <div class="col-lg-8">   
	                         {!!Form::email('mail', '', ['class' => 'form-control','placeholder'=>'example@mail.com','required'])!!}
	                        <!-- <input class="form-control col-md-10" id="inputEmail" placeholder="Email del invitado" type="email" name="mail"> -->
	                     </div>                
	                  </div><br><br> 
					  <div class="form-group"><br><br> 
						 <label class="col-lg-2 control-label">ROL:</label>
							<div class="col-lg-2">
							    <label class="radio-inline">
								<input type="radio" name="rol" value="invitado" checked="checked">Invitado</label>
					        </div>
						    <div class="col-lg-2">
						       <label class="radio-inline">
						       <input type="radio" name="rol" value="creador">Organizador</label>
	            	        </div>
	            	  </div><br><br> 
              </div>
				      @if ($evento->creador == Session::get('usuario_id') ) <!-- si el creador del evento es el mismo usuario de la sesion-->
		                 <?php $usuarios=\App\Usuario::find($evento->creador)?>
		              @endif		      
				      {!!Form::text('eventoid',$evento->id,['class'=>'form-control', 'id'=>'eventoid','TYPE'=>'text' ,'style'=>"display: none"])!!}
				      {!!Form::text('idusuario',$usuarios->id,['class'=>'form-control', 'id'=>'idusuario','TYPE'=>'text' ,'style'=>"display: none"])!!}
		      <div class="modal-footer">
		         		<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        		 {!!Form::submit('Agregar',['id'=>'agregarinvitado','class' => 'btn btn-primary'])!!}
		      </div> 
		      	 {!!Form::close()!!}
	    </div>
  </div>
</div>
<table class="table table-striped table-hover ">
	<thead>
	    <tr>
	      <th>Nombre</th>
	      <th>Email</th>
	      <th>Adultos</th>
	      <th>Niños</th>
	      <th>Notificado</th>
	      <th>Asistirá</th>
	      <th>Costo</th>
	      <th>Gastos</th>
	      <th>Balance</th>
	      <th>Acciones</th> 
	    </tr>
	</thead>
	<tbody>
		<tr>
			<?php 	
			$organizadorID=$evento->creador;
			$organizador=\App\Usuario::find($organizadorID);
			?>
			<td>{{ $organizador->username }} (organizador)</td><!-- NOMBRE -->
			 <td>{{ $organizador->email }}</td>
			 <td>{{ $evento->adultos_organizador }}</td><!-- ADULTOS -->
			 <td>{{ $evento->niños_organizador }}</td><!-- NIÑOS -->
			 <td><span class="glyphicon glyphicon-ok"></td><!-- NOTIFICADO -->
			 <td><span class="glyphicon glyphicon-ok"></td><!-- ASISTIRA: 	SI -->
			 <td>${{ $evento->costo_organizador }}</td>
			 <td>${{ $evento->gastos_organizador }}</td>
			 <td>${{ $evento->balance_organizador }}</td>
			 <td><a href="" class="btn btn-info" data-toggle='modal' data-target='#popupGastos' id='voy' title="Rendir gastos">   
			     <span class="glyphicon glyphicon-usd"></span></a>
			 </td>
		</tr>
		@foreach($invitados as $invitado)
	 	  <tr>
	 	  	 <?php $invitadoName=\App\Usuario::find($invitado->idusuario)?>
			 <td>{{ $invitadoName->username }}</td><!-- NOMBRE -->
			 <td>{{ $invitado->email }}</td><!-- EMAIL -->
			 <td>{{ $invitado->adultos }}</td><!-- ADULTOS -->
			 <td>{{ $invitado->menores }}</td><!-- NIÑOS -->
			 <td><span class="glyphicon glyphicon-ok"></td><!-- NOTIFICADO -->
			 @if ($invitado->confirmado==1)<!-- ASISTIRA: 	SI -->
			   <td><span class="glyphicon glyphicon-ok"></td>
			 @endif
			 @if ($invitado->confirmado==2)<!-- ASISTIRA: NO -->
			   <td><span class="glyphicon glyphicon-remove"></td>
 			 @endif
			 @if ($invitado->confirmado==0)<!-- ASISTIRA: NO SE -->
			   <td><span class="glyphicon glyphicon-question-sign"></td>
			 @endif
			 <td>${{$invitado->costo}}</td><!-- COSTO -->
			 <td>${{ $invitado->gasto }}</td><!-- GASTO DEL INVITADO-->
		     <td>${{$invitado->balance}}</td><!-- BALANCE, COSTO-GASTO -->
		   	 <td><!-- ACIIONES: REENVIAR INVITACION/ELIMINAR INVITADO-->
		   		  @if ($invitado->confirmado!=1)
		   		  <a href="{{ route('invitados.reenviarInvitacion', [$invitado->id, $evento->id])}}" class="btn btn-success" title="Reenviar invitación"> Reenviar invitación</a> <!--REENVIAR INVITACION -->
		         @endif
		         <a href="{{ route('invitados.destroy', $invitado->id) }}" class="btn btn-danger" title="Eliminar invitado"><span class="glyphicon glyphicon-trash"></span></a> <!-- ELIMINAR INVITADO-->
		   	 </td>
		  </tr>		
		   @endforeach   
	</tbody>
</table>
<br> <br>
<a href="{{ route('invitados.reInvitar', $evento->id)}}" class="btn btn-warning">Reenviar invitación a no confirmados</a>
<a href="{{ route('invitados.enviarCuentas', $evento->id)}}" class="btn btn-success">Enviar cuentas a asistentes</a> 
@if ($evento->cerrado!=1)
	<a href="app/views/includes/eventos" class="btn btn-primary" data-toggle='modal' data-target='#popupCerrarEvento' id='cerrarEvento'>CERRAR EVENTO</a><br>
@endif
<div class="modal" id='popupCerrarEvento' role='dialog'>
  <div class="modal-dialog">
	    <div class="modal-content">
		      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title">Cerrar evento</h4>
		      </div>
		      <div class="modal-body">
		         {!!Form::open(['method' => 'POST', 'role' => 'form', 'action' =>'EventosController@cerrarEvento'])!!}
					  <div class="form-group">
	                     <label>Al cerrar el evento no podrás agregar nuevos invitados</label><br><br>
	                     <label>Ya invitaste a todos?</label>
	                  </div>
			  </div>
			  {!!Form::text('eventoid',$evento->id,['class'=>'form-control', 'id'=>'eventoid','TYPE'=>'text' ,'style'=>"display: none"])!!}
			  <div class="modal-footer">
		         <button type="button" class="btn btn-primary" data-dismiss="modal">No, cancelar el cierre del evento</button>
		      	 {!!Form::submit('Si, cerrar evento',['id'=>'cerrarEvento','class' => 'btn btn-success'])!!}
		      </div> 
		     {!!Form::close()!!}
	    </div>
  </div>
</div>
<!-- POP UP PARA GASTOS -->	
	<div class="modal" id='popupGastos' role='dialog'>
		  <div class="modal-dialog">
			    <div class="modal-content">
				      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title">Rendir gastos</h4>
				      </div>
				      <div class="modal-body">
					      	{!!Form::open(['method' => 'POST', 'role' => 'form', 'action' =>'EventosController@gastosOrganizador'])!!}
					        <label for="inputArticulo" class="col-lg-4 control-label">Cuánto gasté en total?</label> 
			                <div class="col-lg-8">   
			                  	{!!Form::number('gastado', '', ['class' => 'form-control col-md-5','min'=>'0', 'id'=>'cantidad', 'placeholder'=>'$'])!!}
			                    {!!Form::text('evid',$evento->id,['class'=>'form-control', 'id'=>'eventoid','TYPE'=>'text' ,'style'=>"display: none"])!!}
			                </div>                
			          </div> <br><br> 
			          <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				          {!!Form::submit('Enviar gastos',['id'=>'agregaritem','class' => 'btn btn-primary'])!!} 
				          {!!Form::close()!!} 
				      </div>
			    </div>
		  </div>
	</div>