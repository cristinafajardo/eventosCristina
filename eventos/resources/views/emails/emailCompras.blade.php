<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		<p>Hola!<br>Tu amig@ <strong>{{$creador}}</strong> te envía la lista de compras del evento <strong>{{$evento}}</strong>.</p>
		<table class="table table-striped table-hover ">
			<thead>
			   <tr>
			       <th>Qué hace falta?</th>
			       <th>Quien trae?</th>
			       <th>Cuántos hay?</th> 
			       <th>Faltan</th>			      
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
							    </div>
								<?php $cantItem=$cantItem+($itemok->cantidad)?>                               
				       	    @endif 
				         @endforeach    
				      </td>
				      <td> {{$cantItem}}/{{$item->cantidad}} </td>
				      <td> {{$item->cantidad -$cantItem}}</td>
				   </tr>
				   <tr><br></tr>
				@endforeach
			</tbody>
		</table> 
		<p><br><br>eventos-cris.tk</a>
		<p>Un saludo!</p>
	</body>
</html>