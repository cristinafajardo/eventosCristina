<div class="modal" id='popupAsignarItem' role='dialog'>
  <div class="modal-dialog">
	    <div class="modal-content">
		      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title">Asignar Item</h4>
		      </div>
		      <div class="modal-body">
			      	{!!Form::open(['method' => 'POST', 'role' => 'form', 'action' =>'ItemsController@asignarItem'])!!}
	                	 <label for="inputArticulo" class="col-lg-3 control-label">Item:</label> 
	                     <div class="col-lg-8">
	                     	{!!Form::text('nombreitem','',['class'=>'form-control col-md-10', 'id'=>'nombreitem','disabled'=>'true'])!!}
	                    	<!--  <input class="form-control col-md-10" id="inputArticulo" placeholder="Nombre" type="text" name="nombrearticulo">  -->
	                	 </div><br><br><br>
			      	     <label for="inputArticulo" class="col-lg-3 control-label">Asignar a:</label> 
	                     <div class="col-lg-8">
	                     	{!!Form::text('nombreinvitado','',['class'=>'form-control col-md-10', 'id'=>'nombreinvitado'])!!}
	                    	<!--  <input class="form-control col-md-10" id="inputArticulo" placeholder="Nombre" type="text" name="nombrearticulo">  -->
	                	 </div><br><br><br>
	                	 <label for="cantidad" class="col-lg-3 control-label">Cantidad a llevar:</label>
	                     <div class="col-lg-8">   
	                     	{!!Form::number('cantidad', '', ['class' => 'form-control col-md-10"','min'=>'0', 'id'=>'cantidad'])!!}
	                        <!-- <input class="form-control col-md-10" id="inputCantidad" placeholder="Cantidad necesaria" type="number" name="cantidad" min="0"> -->
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