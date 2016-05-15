@extends('admin.template.layout')
@section('title')
    Eventos de Cris
@endsection
@section('content')
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
                        <p>sólo con un par de clicks</p>
                        <p><a href="#" class="btn btn-primary" role="button">Registrate Ahora!</a> </p>
                      </div>
                  </div>
              </div>
              <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{ asset('img/te.jpg') }}" alt="...">
                        <div class="caption" align="center">
                          <h3>INVITA</h3>
                          <p>Invita a todos tus amigos</p>
                          <p><a href="#" class="btn btn-primary" role="button">Invita amig@s!</a> </p>
                        </div>
                    </div>
              </div>
              <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{ asset('img/torta.jpg') }}"alt="...">
                        <div class="caption" align="center">
                          <h3>DISFRUTA</h3>
                          <p>El ultimo paso y buen provecho!</p>
                          <p><a href="#" class="btn btn-primary" role="button">Comenzá a disfrutar!</a> </p>
                        </div>
                    </div>
              </div>
      </div>
  </div> 
@endsection