@extends('admin.template.layout')
@section('title')
    Mis Eventos
@endsection
@section('content')
    @if(!Session::has('usuario_id'))
        @include('restringido')
    @else
		<h1>Mis Eventos</h1>
		<ul class="nav navbar-right">  
		  <a href="{{ url('organizaEvento') }}" class="btn btn-warning">Organizar evento +</a><br><br>
		</ul>
		<div class="container">
			 <table class="table table-striped table-hover ">
				<thead>
				    <tr>
				       <th>ID</th>
				       <th>Nombre evento</th>
				       <th>Lugar</th>
				       <th>Fecha</th>
				       <th>Organizador</th>
				       <th>Acciones</th>
				    </tr>
				</thead>
				<tbody>
					<?php $eventoID=-1?> <!-- creo una variable y la inicializo. aca guardo el id del evento mas adelante -->
					@foreach ($invitados as $invitado) <!-- aca obtengo los eventos a los que fui invitada -->
						@if ($invitado->idusuario == Session::get('usuario_id'))
							<?php $eventoID= ($invitado->idevento); ?>
						@endif
		            @endforeach
			     	@foreach($eventosCreados as $evento) <!-- recorre la tabla de eventos-->
			      		@if ($evento->creador == Session::get('usuario_id') ) <!-- si el creador del evento es el mismo usuario de la sesion-->
	                  		<?php $usuarios=\App\Usuario::find($evento->creador)?><!-- esto lo hace para obtener el nombre del creador del evento -->
					   		   <tr>
					   		   	 <td>{{ $evento->id }}</td>
					   			 <td>{{ $evento->nombre }}</td>
					   			 <td>{{ $evento->direccion }}</td>
					   			 <td>{{ $evento->fecha }}</td>
					   			 <td>{{ $usuarios->username  }}</td>
					   			 <td>
					   				 <a href="{{ route('misEventos.edit', $evento->id) }}" class="btn btn-success" title="Editar evento"> 
			                         <span class="glyphicon glyphicon-pencil" ></span></a>
			                         <a href="{{ route('misEventos.destroy', $evento->id) }}" class="btn btn-danger" title="Eliminar evento"> 
			                         <span class="glyphicon glyphicon-trash"></span></a> 
			                     </td>
					   		   </tr>
			            @endif
				    @endforeach
					@foreach($eventosCreados as $evento) <!-- recorre la tabla de eventos-->
			      		@if ($evento->id == $eventoID )
	                  		<?php $usuarios=\App\Usuario::find($evento->creador)?><!-- esto lo hace para obtener el nombre del creador del evento -->
					   		   <tr>
					   		   	 <td>{{ $evento->id }}</td>
					   			 <td>{{ $evento->nombre }}</td>
					   			 <td>{{ $evento->direccion }}</td>
					   			 <td>{{ $evento->fecha }}</td>
					   			 <td>{{ $usuarios->username }}</td>
					   			 <td>
					   				 <a href="{{ route('misEventos.edit', $evento->id) }}" class="btn btn-primary"  title="Ver evento"> 
			                         <span class="glyphicon glyphicon-zoom-in" ></span></a>
			                         <a href="app/views/includes/eventos" class="btn btn-success" data-toggle='modal' data-target='#popupAsistencia' id='voy' title="Confirmar asistencia">   
			                         <span class="glyphicon glyphicon-ok"></span></a>  
			                          <a href="{{ route('misEventos.rendirGastos', $evento->id) }}" class="btn btn-info" data-toggle='modal' data-target='#popupGastos' id='voy' title="Rendir gastos">   
			                         <span class="glyphicon glyphicon-usd"></span></a>  
					   			 </td>
					   		   </tr>
					    @endif
				    @endforeach
				</tbody> 
			</table>  
		</div>
		{!! $eventosCreados->render() !!}
    @endif
<!-- POP UP PARA CONFIRMAR ASISTENCIA -->	
	<div class="modal" id='popupAsistencia' role='dialog'>
		  <div class="modal-dialog">
			    <div class="modal-content">
				      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title">Confirmar asistencia</h4>
				      </div>
				      <div class="modal-body">
					      	{!!Form::open(['method' => 'post', 'role' => 'form', 'action' =>'EventosController@confirmarAsistencia'])!!}
					      	   <label for="inputArticulo" class="col-lg-2 control-label">Voy?</label> 
			                   <div class="col-lg-8">
			                      {!!Form::select('ir',['si'=>'SI', 'no'=>'NO','nose'=>'LO ESTOY PENSANDO'],'si', [ 'class'=>'form-control'])!!}
			                      {!!Form::text('evid',$eventoID,['class'=>'form-control', 'id'=>'eventoid','TYPE'=>'text' ,'style'=>"display: none"])!!}
			                   </div><br><br><br>
			                   <label for="cantidad" class="col-lg-2 control-label">Adultos:</label>
			                   <div class="col-lg-8">   
			                      {!!Form::number('adultos', '', ['class' => 'form-control col-md-10"','min'=>'0', 'id'=>'adultos'])!!}
			                   </div><br><br><br>
			                   <label for="cantidad" class="col-lg-2 control-label">Niños:</label>
			                   <div class="col-lg-8">   
			                       {!!Form::number('niños', '', ['class' => 'form-control col-md-10"','min'=>'0', 'id'=>'niños'])!!}
			                       <!-- <input class="form-control col-md-10" id="inputCantidad" placeholder="Cantidad necesaria" type="number" name="cantidad" min="0"> -->
			                   </div>                               
			          </div> <br><br> 
				      <div class="modal-footer">
				         <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				          {!!Form::submit('Responder',['id'=>'agregaritem','class' => 'btn btn-primary'])!!} 
				          
				          {!!Form::close()!!} 
				      </div>
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
					      	{!!Form::open(['method' => 'POST', 'role' => 'form', 'action' =>'EventosController@rendirGastos'])!!}
					        <label for="inputArticulo" class="col-lg-4 control-label">Cuánto gasté?</label> 
			                <div class="col-lg-8">   
			                  	{!!Form::number('gastado', '', ['class' => 'form-control col-md-5','min'=>'0', 'id'=>'cantidad', 'placeholder'=>'$'])!!}
			                    {!!Form::text('evid',$eventoID,['class'=>'form-control', 'id'=>'eventoid','TYPE'=>'text' ,'style'=>"display: none"])!!}
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
@endsection