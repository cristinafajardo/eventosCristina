<script src="{{ asset('js/listaCerrada.js') }}"></script>
<div class="modal" id='popupLlevarItem' role='dialog'>
  <div class="modal-dialog">
	    <div class="modal-content">
		      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title">Llevar Item</h4>
		      </div>
		      <div class="modal-body">
			      	{!!Form::open(['method' => 'POST', 'role' => 'form', 'action' =>'ItemsController@llevarItem'])!!}

			      	     <label for="inputArticulo" class="col-lg-2 control-label">Item:</label> 
	                     <div class="col-lg-8">
	                     	{!!Form::text('nombrearticulo','',['class'=>'form-control col-md-10','id'=>'nombre'])!!}
	                    	<!--  <input class="form-control col-md-10" id="inputArticulo" placeholder="Nombre" type="text" name="nombrearticulo">  -->
	                	 </div><br><br><br>
	                     <label for="cantidad" class="col-lg-2 control-label">Cantidad que llevo:</label>
	                     <div class="col-lg-8">   
	                     	{!!Form::number('cantidad', '', ['class' => 'form-control col-md-10"','min'=>'0', 'id'=>'cantidad'])!!}
	                        <!-- <input class="form-control col-md-10" id="inputCantidad" placeholder="Cantidad necesaria" type="number" name="cantidad" min="0"> -->
	              	     </div>               
	              	     {!!Form::text('id','',['class'=>'form-control', 'id'=>'eventoid','TYPE'=>'text' ,'style'=>"display: none"])!!}
	          </div> <br><br> 
		      <div class="modal-footer">
		         <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		          		{!!Form::submit('Llevar',['id'=>'agregaritem','class' => 'btn btn-primary'])!!} 
		            {!!Form::close()!!} 
		      </div>
	    </div>
  </div>
</div>