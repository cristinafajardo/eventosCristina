@extends('admin.template.main')
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>@yield('title', 'Default') </title>
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
    </head>
    <body>
    	<section>
           <nav class="navbar navbar-inverse">
                  <div class="container-fluid">
                        <div class="navbar-header">
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                              </button>
                              <a class="navbar-brand" href="#">Eventos de Cris</a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                              <ul class="nav navbar-nav">
                                    <li class="active"><a href="#">Inicio <span class="sr-only">(current)</span></a></li>
                                    <li><a href="{{ asset('admin.template.que') }}">Que es Eventos de Cris</a></li>
                                    <li><a href="#">Quienes Somos</a></li>
                                    <li><a href="#">Contacto</a></li>
                              </ul>
                              <ul class="nav navbar-nav navbar-right">
                                    <li><a href="#">Inicio de sesion</a></li>
                                    <li><a href="#">Registrarse</a></li>
                              </ul>
                        </div>
                  </div>
            </nav>
        </section>
        <section>
           <div class="container">
                  @yield('carousel')
            </div> 
        </section>
    	<footer>
    		     <div class="row"> <br><br><br></div>
                 <nav class="navbar navbar-inverse navbar-fixed-bottom">
                    <div class="container-fluid">
                          <div class="col-md-4"></div>
                          <div class="collapse navbar-collapse col-md-4" id="bs-example-navbar-collapse-2">
                                <ul class="nav navbar-nav" >
                                      <li><a href="#"> Feisbuk <span class="sr-only">(current)</span></a></li>
                                      <li><a href="#"> tuiterr </a></li>
                                      <li><a href="#">intercagram</a></li>
                                </ul>
                          </div>
                          <div class="col-md-4"></div> 
                    </div>
                 </nav>
    	</footer>
    	<script src="{{ asset('plugins/jquery/js/jquery-2.1.4.js') }}"> </script>
    	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"> </script>
    </body>
</html>
<!-- @extends('admin.template.main')

@section('title')
    Eventos de Cris
@endsection

@section('navbar')
  
@endsection

@section('carousel')
  
@endsection
 @section('content')
<div class="container">
   
</div>
@endsection 

@section('footer')
     
@endsection -->