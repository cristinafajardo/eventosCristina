<div class="container-fluid">
      <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href= "{{ url('/') }}">Eventos de Cris</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
                  <li class="active"><a href= "{{ url('/') }}">Inicio <span class="sr-only">(current)</span></a></li>
                  <li><a href="{{ url('que') }}">Qué es Eventos de Cris</a></li>
                  <li><a href="{{ url('quienes') }}">Quienes Somos</a></li>
                  <li><a href="{{ url('contacto') }}">Contacto</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                  <li><a href="{{ url('login') }}">Inicio de sesión</a></li>
                  <li><a href="{{ url('registro') }}">Registrarse</a></li>
            </ul>
      </div>
</div>