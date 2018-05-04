@extends('admin.template.layout')
@section('title')
    Perfil
@endsection
@section('content')<legend>Mis datos</legend>
	<div class="container">
		
			
            <p>Nombre de usuario: <!-- {{Session::get('usuario_username')}} --> </p>
            <p>Email: <!-- {{Session::get('usuario_email')}} --> </p>     
       
			
    </div>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
@endsection