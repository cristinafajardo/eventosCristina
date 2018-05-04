<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		<p>Hola {{$nombre}}!<br>Tu amig@ <strong>{{$creador}}</strong> te envía los gastos correspondientes al evento <strong>{{$evento}}</strong>.</p>
		<p>Gastaste: $ {{$gastos}}</p>
		<p>El costo del evento para vos es de: $ {{$costos}}</p>
		<p>Tu balance es de: $ {{($costos)-($gastos)}} </p>
		<p><br>eventos-cris.tk</a>
		<p>Un saludo!</p>
	</body>
</html>
