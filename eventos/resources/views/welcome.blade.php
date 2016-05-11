@extends('admin.template.main')

@section('title')
    Eventos de Cris
@endsection
@section('navbar')
    
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
@endsection

@section('carousel')
  <div class="container">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="{{ asset('img/muffins.jpg') }}" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('img/carne.jpg') }}" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('img/pastel.jpg') }}" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
      </div>
      <br>
      <div class="row">
              <div class="col-sm-6 col-md-4">
                  <div class="thumbnail">
                      <img src="{{ asset('img/cafe.jpg') }}" alt="...">
                      <div class="caption" align="center">
                        <h3>ORGANIZÁ RAPIDO Y FACIL!</h3>
                        <p>Ahorrá tiempo! Porque con Meating calculamos todo y lo haces en un touch!</p>
                        <p><a href="../MEating/registro.php" class="btn btn-primary" role="button">Registrate Ahora!</a> </p>
                      </div>
                  </div>
              </div>
              <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{ asset('img/te.jpg') }}" alt="...">
                        <div class="caption" align="center">
                          <h3>INVITA</h3>
                          <p>Invita a todas las personas que quieras porque tenemos el corazon gigante!!</p>
                          <p><a href="../MEating/registro.php" class="btn btn-primary" role="button">Invita amig@s!</a> </p>
                        </div>
                    </div>
              </div>
              <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{ asset('img/torta.jpg') }}"alt="...">
                        <div class="caption" align="center">
                          <h3>DISFRUTA</h3>
                          <p>El ultimo paso y el mejor! Que estas esperando?? Regístrate y SALUD!</p>
                          <p><a href="../MEating/registro.php" class="btn btn-primary" role="button">Comenzá a disfrutar!</a> </p>
                        </div>
                    </div>
              </div>
      </div>
  </div> 
  
@endsection

<!-- @section('content')
<div class="container">
   
</div>
@endsection -->

@section('footer')
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
@endsection


