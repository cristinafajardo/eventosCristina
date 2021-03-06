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
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="{{ asset('img/hamburguesa.jpg') }}" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('img/carne1.jpg') }}" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('img/pizza.jpeg') }}" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('img/bebidas.jpg') }}" alt="...">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('img/tacos.jpg') }}" alt="...">
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
                      <img src="{{ asset('img/contactos.jpg') }}" alt="...">
                      <div class="caption" align="center">
                          <h3>ORGANIZÁ RÁPIDO Y FÁCIL!</h3>
                          <p>Sólo con un par de clicks!!</p>
                           @if(!Session::has('usuario_id'))
                              <p><a href="{{ url('registro') }}" class="btn btn-primary" role="button">Registrate Ahora!</a> </p>
                           @else
                             <p><a href="{{ url('misEventos') }}" class="btn btn-primary" role="button">Organizar evento!</a> </p>
                          @endif
                         
                      </div>
                  </div>
              </div>
              <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{ asset('img/fiesta.jpg') }}" alt="...">
                        <div class="caption" align="center">
                            <h3>INVITÁ</h3>
                            <p>Invitá a todos tus amigos</p>
                            @if(!Session::has('usuario_id'))
                              <p><a href="{{ url('registro') }}" class="btn btn-primary" role="button">Invita Amig@s!</a> </p>
                           @else
                             <p><a href="{{ url('misEventos') }}" class="btn btn-primary" role="button">Organizar evento!</a> </p>
                          @endif
                        </div>
                    </div>
              </div>
              <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{ asset('img/brindis.jpg') }}"alt="...">
                        <div class="caption" align="center">
                            <h3>DISFRUTÁ</h3>
                            <p>El último paso y buen provecho!</p>
                           @if(!Session::has('usuario_id'))
                              <p><a href="{{ url('registro') }}" class="btn btn-primary" role="button">Comenzá a disfrutar!</a> </p>
                           @else
                             <p><a href="{{ url('misEventos') }}" class="btn btn-primary" role="button">Organizar evento!</a> </p>
                          @endif
                        </div>
                    </div>
              </div>
      </div>
  </div> 
@endsection