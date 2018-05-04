@extends('admin.template.layout')
@section('title')
    Perfil
@endsection
@section('content')
    @if(!Session::has('usuario_id'))
        @include('restringido')
    @else
    	<legend>Mis datos</legend>
      <div class="col-lg-2"></div>
      <div class="jumbotron col-lg-8">
          <p><strong>Nombre de usuario:</strong>  {{$usuario->username}}  </p>
          <p><strong>Email:</strong> {{$usuario->email}}  </p>     
          <p><strong>Provincia:</strong> {{$usuario->provincia}}  </p>
         	<p><strong>Ciudad:</strong> {{$usuario->ciudad}}  </p> 
    	    <?php 
              $usuario=Session::get('usuario_id');
          ?>
          <div>
            <ul class="nav navbar-right">  
                 <a href="{{ route('perfil.edit', $usuario) }}" class="btn btn-success" title="Editar perfil"> 
                 <span class="glyphicon glyphicon-pencil" ></span></a>  
            </ul>
          </div> 
      </div>
      <div class="col-lg-2"></div>

    @endif
@endsection