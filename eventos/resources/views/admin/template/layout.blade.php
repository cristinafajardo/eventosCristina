<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>@yield('title', 'Default') </title>
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
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
                                <li><a href="#">Que es Eventos de Cris</a></li>
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
        <div class="container">
            @yield('content');
        </div>
        <div class="row"> <br><br><br></div>
              <nav class="navbar navbar-inverse navbar-fixed-bottom">
                  <div class="container-fluid">
                      <div class="caja-redes">
                               <a href="https://www.linkedin.com" class="icon-button linkedin" target="_blank"><i class="icon-linkedin"></i><span></span></a>
                               <a href="https://www.pinterest.com" class="icon-button pinterest" target="_blank"><i class="icon-pinterest"></i><span></span></a>
                               <a href="https://www.twitter.com" class="icon-button twitter" target="_blank"><i class="icon-twitter"></i><span></span></a>
                               <a href="https://www.facebook.com" class="icon-button facebook" target="_blank"><i class="icon-facebook"></i><span></span></a>
                      </div>
                  </div>
              </nav>
        </div>
    	 <script src="{{ asset('plugins/jquery/js/jquery-2.1.4.js') }}"> </script>
    	 <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"> </script>
    </body>
</html>