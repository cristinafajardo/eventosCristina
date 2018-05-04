<legend>Lista de compras</legend>
<ul class="nav navbar-right">  
	<a href="app/views/includes/eventos" class="btn btn-info" data-toggle='modal' data-target='#popupNuevoItem' id='+item'>Agregar item +</a><br><br><br>
</ul>
<div class="modal" id='popupNuevoItem' role='dialog'>
	  <div class="modal-dialog">
		    <div class="modal-content">
			      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h4 class="modal-title">Nuevo Item</h4>
			      </div>
			      <div class="modal-body">
				      	{!!Form::open(['method' => 'POST', 'url' => '/compras', 'role' => 'form', 'action' =>'ItemsController@store'])!!}
				      	     <label for="inputArticulo" class="col-lg-2 control-label">Artículo:</label> 
		                     <div class="col-lg-8">
		                     	{!!Form::text('nombrearticulo','',['class'=>'form-control col-md-10', 'placeholder'=>'Ej: Pan', 'id'=>'nombreArticulo'])!!}
		                     </div><br><br><br>
		                     <label for="cantidad" class="col-lg-2 control-label">Cantidad:</label>
		                     <div class="col-lg-8">   
		                     	{!!Form::number('cantidad', '', ['class' => 'form-control col-md-10"','min'=>'0', 'id'=>'cantidadArticulo'])!!}
		                     </div>                
		                     {!!Form::text('eventoid',$evento->id,['class'=>'form-control', 'id'=>'eventoid','TYPE'=>'text' ,'style'=>"display: none"])!!}
			      </div> <br><br> 
			      <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			          {!!Form::submit('Agregar',['id'=>'agregaritem','class' => 'btn btn-primary'])!!} 
			          {!!Form::close()!!} 
			      </div>
		    </div>
	  </div>
</div>
<table class="table table-striped table-hover ">
<thead>
   <tr>
       <th>Qué hace falta?</th>
       <th>Quien trae?</th>
       <th>Cuántos hay?</th> 
       <th>Faltan</th>
       <th>Acciones</th>
   </tr>
</thead>
<tbody>
		@foreach($items as $item) 
		   <tr>
		      <td>{{ $item->nombre }}</td>
		      <td>
		         <?php $cantItem=0;?>
		         @foreach($itemsOK as $itemok)   
		       	    @if($itemok->iditem == $item->id)
		       	    	<?php $nombreUsuario=\App\Usuario::find($itemok->idusuario)?>
		       	    	<div>
							<label class="btn btn-default" >{{$nombreUsuario->username}} <span class="badge ">({{$itemok->cantidad}})</span>
							<a href="{{ route('comprasok.destroy', $itemok->id) }}" class="btn btn-danger" title="Eliminar" ><span class="glyphicon glyphicon-remove-circle"></span></a></label>  
					    </div>
						<?php $cantItem=$cantItem+($itemok->cantidad)?>                               
		       	    @endif 
		         @endforeach    
		      </td>
		      <td> {{$cantItem}}/{{$item->cantidad}} </td>
		      <td> {{$item->cantidad -$cantItem}}</td>
		      <td>
		        <a href="app/views/includes/eventos" class="btn btn-success" data-toggle='modal' data-target='#popupLlevarItem' id='llevoitem'>Llevar</a>  
				<a href="app/views/includes/eventos" class="btn btn-warning" data-toggle='modal' data-target='#popupAsignarItem' id='asignaitem'>Asignar</a> 
				<a href="{{ route('compras.destroy', $item->id) }}" class="btn btn-danger" title="Eliminar" ><span class="glyphicon glyphicon-trash"></span></a> 
		      </td>
		   </tr>
        @endforeach
</tbody>
</table> 
<a href="{{ route('compras.enviarCompras', $evento->id ) }}" class="btn btn-success">Enviar lista de compras</a>
<!-- POP UP DE LLEVAR ITEM -->
<div class="modal" id='popupLlevarItem' role='dialog'>
  <div class="modal-dialog">
	    <div class="modal-content">
		      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title">Llevar Item</h4>
		      </div>
		       <?php $invitados=\App\Invitado::where('idevento',$evento->id)->get();
			 	     $items=\App\Item::where('idevento',$evento->id)->get();
			   ?>
		      <div class="modal-body">
			    {!!Form::open(['method' => 'POST', 'role' => 'form', 'action' =>'ItemsController@llevarItem'])!!}
		      	   <label for="inputArticulo" class="col-lg-2 control-label">Item:</label> 
                   <div class="col-lg-8">
                     	<select class="form-control" id="select" name="nombreitem">
					          @foreach($items as $item) 
					             <option value="{{ $item->id }}" name="iditem">
					            	{{ $item->nombre }} 
					             </option>
							  @endforeach
					    </select>
                   </div><br><br><br>
                   <label for="cantidad" class="col-lg-2 control-label">Cantidad que llevo:</label>
                   <div class="col-lg-8">   
                      {!!Form::number('cantidad', '', ['class' => 'form-control col-md-10"','min'=>'1', 'id'=>'cantidad', 'required'])!!}
                   </div>               
              </div> <br><br> 
		      <div class="modal-footer">
		           <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		           {!!Form::submit('Llevar',['id'=>'agregaritem','class' => 'btn btn-primary'])!!} 
		        {!!Form::close()!!} 
		      </div>
	    </div>
  </div>
</div>
<!-- fin POP UP DE LLEVAR ITEM-->
<!-- POP UP DE ASIGNAR ITEM-->
<div class="modal" id='popupAsignarItem' role='dialog'>
  <div class="modal-dialog">
	    <div class="modal-content">
		      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title">Asignar Item</h4>
		      </div>
			 <?php 
			    $invitados=\App\Invitado::where('idevento',$evento->id)->get();
			 	$items=\App\Item::where('idevento',$evento->id)->get();
			 ?>
		      <div class="modal-body">
			      	{!!Form::open(['method' => 'POST', 'role' => 'form', 'action' =>'ItemsController@asignarItem'])!!}
	                	<label for="inputArticulo" class="col-lg-3 control-label">Item:</label> 
	                    <div class="col-lg-8">
						   	<select class="form-control" id="select" name="nombreitem">
					          @foreach($items as $item) 
					             <option value="{{ $item->id }} " name="iditem">
					            	{{ $item->nombre }} 
					             </option>
			     			  @endforeach
        		            </select>
					    </div><br><br><br>
			      	    <label for="inputArticulo" class="col-lg-3 control-label">Asignar a:</label> 
	                    <div class="col-lg-8">
	                     	<select class="form-control" id="select" name="nombreinvitado">
					          @foreach($invitados as $usuario) 
					          	<?php $invitadoName=\App\Usuario::find($usuario->idusuario);?>
					             <option value="{{ $usuario->idusuario }}" name="iditem">
					            	{{ $invitadoName->username }}
					             </option>
							  @endforeach
        		            </select>
	                    </div><br><br><br>
	                	<label for="cantidad" class="col-lg-3 control-label">Cantidad a llevar:</label>
	                    <div class="col-lg-8">   
	                     	{!!Form::number('cantidad', '', ['class' => 'form-control col-md-10"','min'=>'1', 'id'=>'cantidad', 'required'])!!}
	                    </div>                
	          </div> <br><br> 
		      <div class="modal-footer">
		         <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		          {!!Form::submit('Asignar',['id'=>'agregaritem','class' => 'btn btn-primary'])!!} 
		          {!!Form::close()!!} 
		      </div>
	    </div>
  </div>
</div>