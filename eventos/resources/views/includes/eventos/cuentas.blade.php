<legend>Cuentas</legend>
<div class="form-group">
 		<div class="col-lg-5">
	        <div class="radio">
		         <label >
		            <input type="radio" name="rbCuentas" id="1" value="1" checked="" onclick='op1()'>El organizador invita
		        </label>    
	        </div>
   			<div class="radio">
   			    <label>
		           <input type="radio" name="rbCuentas" id="2" value="2" onclick='op2()'>Se establece un valor fijo
		        </label> 
	        </div>
	        <div class="radio">
	            <label>
		            <input type="radio" name="rbCuentas" id="3" value="3" onclick='op3()'>Se establece un valor fijo por asistente
		        </label> 
	        </div>
	        <div class="radio">
	        	<label>
		            <input type="radio" name="rbCuentas" id="4" value="4" onclick='op4()'>Se divide lo gastado en partes iguales
		        </label> 
	        </div>
	        <div class="radio">
	        	<label>
	          	    <input type="radio" name="rbCuentas" id="5" value="5" onclick='op5()'>Se divide lo gastado según asistentes
		        </label> 
	        </div>
	        <div class="radio">
	        	<label>
		            <input type="radio" name="rbCuentas" id="6" value="6" onclick='op6()'>Se divide un valor arbitrario en partes iguales
		        </label>
	        </div>
	        <div class="radio">
	        	<label>
		            <input type="radio" name="rbCuentas" id="7" value="7" onclick='op7()'>Se divide un valor arbitrario según asistentes
		        </label> 
	        </div>
 		</div>
 		<!-- Descripciones de cada método -->
 		<div class="col-lg-7 form-group" id='infoCuenta1'>
 			<legend>No se hacen cuentas</legend>
 			{!!Form::open(['method' => 'POST', 'role' => 'form', 'action' =>'EventosController@cuentas'])!!}
	 			{!!Form::text('eventoid',$evento->id,['class'=>'form-control', 'id'=>'eventoid','TYPE'=>'text' ,'style'=>"display: none"])!!}
	 			 {!!Form::text('opcion','1',['class'=>'form-control', 'id'=>'opcion','TYPE'=>'text' ,'style'=>"display: none"])!!}
	 			<div class="form-group navbar-right">
				    <div class="col-lg-10 col-lg-offset-2">
					    {!!Form::submit('Guardar', array('class' => 'btn btn-success')) !!}
				    </div>
	   			</div>
   			{!!Form::close()!!}
 		</div>
 		<div class="col-lg-7 form-group" id='infoCuenta2' style="display:none;">
 			<legend>Valor fijo para cada invitado</legend>
 			{!!Form::open(['method' => 'POST', 'role' => 'form', 'action' =>'EventosController@cuentas'])!!}
	 			<label class="control-label">Costo por persona:</label>
	 			{!!Form::number('valor', '', ['class' => 'form-control col-md-10"','min'=>'0', 'id'=>'valor','required'])!!}
	 			{!!Form::text('eventoid',$evento->id,['class'=>'form-control', 'id'=>'eventoid','TYPE'=>'text' ,'style'=>"display: none"])!!}
	 			{!!Form::text('opcion','2',['class'=>'form-control', 'id'=>'opcion','TYPE'=>'text' ,'style'=>"display: none"])!!}
	 			<br>
	 			<div class="form-group navbar-right">
				      <div class="col-lg-10 col-lg-offset-2">
				        {!!Form::submit('Guardar', array('class' => 'btn btn-success')) !!}
				      </div>
	   			</div>
	   	    {!!Form::close()!!}
 		</div>
 		<div class="col-lg-7 form-group" id='infoCuenta3' style="display:none;">
 			<legend> Valor fijo diferenciado segun Adulto-Niño</legend>
			{!!Form::open(['method' => 'POST', 'role' => 'form', 'action' =>'EventosController@cuentas'])!!}
				<label class="control-label">Costo por Adulto:</label>
	 			{!!Form::number('valorAdulto', '', ['class' => 'form-control col-md-10"','min'=>'0', 'id'=>'valorAdulto','required'])!!}
	 			<label class="control-label">Costo por Niño:</label>
	 			{!!Form::number('valorNiño', '', ['class' => 'form-control col-md-10"','min'=>'0', 'id'=>'valorNiño','required'])!!}
	 			{!!Form::text('eventoid',$evento->id,['class'=>'form-control', 'id'=>'eventoid','TYPE'=>'text' ,'style'=>"display: none"])!!}
	 			{!!Form::text('opcion','3',['class'=>'form-control', 'id'=>'opcion','TYPE'=>'text' ,'style'=>"display: none"])!!}
	 			<br>
		        <div class="form-group navbar-right">
			        <div class="col-lg-10 col-lg-offset-2">
			        	{!!Form::submit('Guardar', array('class' => 'btn btn-success')) !!}
			        </div>
			    </div>
			{!!Form::close()!!}
	    </div>
 		<div class="col-lg-7 form-group" id='infoCuenta4' style="display:none;">
 			<legend>Se divide lo gastado por todos los invitados, en partes iguales</legend>
 			{!!Form::open(['method' => 'POST', 'role' => 'form', 'action' =>'EventosController@cuentas'])!!}
	 			{!!Form::text('eventoid',$evento->id,['class'=>'form-control', 'id'=>'eventoid','TYPE'=>'text' ,'style'=>"display: none"])!!}
	 			{!!Form::text('opcion','4',['class'=>'form-control', 'id'=>'opcion','TYPE'=>'text' ,'style'=>"display: none"])!!}
	 			<br>
	 			<div class="form-group navbar-right"> 
			        <div class="col-lg-10 col-lg-offset-2">
			       		{!!Form::submit('Guardar', array('class' => 'btn btn-success')) !!}
			        </div>
			    </div>
			{!!Form::close()!!}
	    </div>
 		<div class="col-lg-7 form-group" id='infoCuenta5' style="display:none;">
 			<legend>Se divide lo gastado diferenciando porcentaje de niños y adultos</legend>
 			{!!Form::open(['method' => 'POST', 'role' => 'form', 'action' =>'EventosController@cuentas'])!!}
	 			 <label class="control-label">Porcentaje a pagar por los Adultos:</label>
	 			{!!Form::number('porcentajeAdulto', '', ['class' => 'form-control col-md-10"','min'=>'0','max'=>'100', 'id'=>'valorAdulto','required'])!!}
	 			<label class="control-label">Porcentaje a pagar por los Niños:</label>
	 			{!!Form::number('porcentajeNiño', '', ['class' => 'form-control col-md-10"','min'=>'0','max'=>'100','id'=>'valorNiño','required'])!!}
	 			{!!Form::text('eventoid',$evento->id,['class'=>'form-control', 'id'=>'eventoid','TYPE'=>'text' ,'style'=>"display: none"])!!}
	 			{!!Form::text('opcion','5',['class'=>'form-control', 'id'=>'opcion','TYPE'=>'text' ,'style'=>"display: none"])!!}
	 			<br>
	 			<div class="form-group navbar-right">
			        <div class="col-lg-10 col-lg-offset-2">
			        	{!!Form::submit('Guardar', array('class' => 'btn btn-success')) !!}
			        </div>
			    </div>
			{!!Form::close()!!}
	    </div>
 		<div class="col-lg-7 form-group" id='infoCuenta6' style="display:none;">
 			<legend>Se divide un valor arbitrario entre todos los invitados</legend>
 			{!!Form::open(['method' => 'POST', 'role' => 'form', 'action' =>'EventosController@cuentas'])!!}
	 			<label class="control-label">Total estimado:</label>
	 			{!!Form::number('valor', '', ['class' => 'form-control col-md-10"','min'=>'0', 'id'=>'valor'])!!}
	 			{!!Form::text('eventoid',$evento->id,['class'=>'form-control', 'id'=>'eventoid','TYPE'=>'text' ,'style'=>"display: none"])!!}
	 			{!!Form::text('opcion','6',['class'=>'form-control', 'id'=>'opcion','TYPE'=>'text' ,'style'=>"display: none"])!!}
	 			<br>
	 			<div class="form-group navbar-right">
			        <div class="col-lg-10 col-lg-offset-2">
			        	{!!Form::submit('Guardar', array('class' => 'btn btn-success')) !!}
			        </div>
			    </div>
			{!!Form::close()!!}
	    </div>
        <div class="col-lg-7 form-group" id='infoCuenta7' style="display:none;">
 			<legend>Se divide un valor arbitrario según asistentes</legend>
 			{!!Form::open(['method' => 'POST', 'role' => 'form', 'action' =>'EventosController@cuentas'])!!}
	 			<label class="control-label">Costo estimado:</label>
	 			{!!Form::number('costoArbitrario', '', ['class' => 'form-control col-md-10"','min'=>'0', 'id'=>'valor','required'])!!}
	 			 <label class="control-label">Porcentaje a pagar por los Adultos:</label>
	 			{!!Form::number('porcentajeAdulto', '', ['class' => 'form-control col-md-10"','min'=>'0','max'=>'100', 'id'=>'valorAdulto','required'])!!}
	 			<label class="control-label">Porcentaje a pagar por los Niños:</label>
	 			{!!Form::number('porcentajeNiño', '', ['class' => 'form-control col-md-10"','min'=>'0','max'=>'100','id'=>'valorNiño','required'])!!}
	 			{!!Form::text('eventoid',$evento->id,['class'=>'form-control', 'id'=>'eventoid','TYPE'=>'text' ,'style'=>"display: none"])!!}
	 			{!!Form::text('opcion','7',['class'=>'form-control', 'id'=>'opcion','TYPE'=>'text' ,'style'=>"display: none"])!!}
	 			<br>
	 			<div class="form-group navbar-right">
			        <div class="col-lg-10 col-lg-offset-2">
			       	   {!!Form::submit('Guardar', array('class' => 'btn btn-success')) !!}
			        </div>
		    	</div>
		    {!!Form::close()!!}
	    </div>
</div>