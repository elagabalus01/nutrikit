<nav class="navbar navbar-expand-lg navbar-custom bg-custom">
  <a class="navbar-brand" href="/citas">NUTRIKIT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav mr-auto">
        @if(preg_match('/^citas\/*[0-9]*$/',Request::path()))
          <a class="nav-item nav-link active" href="/citas">Citas</a>
        @else
        <a class="nav-item nav-link" href="/citas">Citas</a>
        @endif
        
        @if(preg_match('/^consultas\/*[0-9]*$/',Request::path()))
        <a class="nav-item nav-link active" href="/consultas">Consultas</a>
        @else
        <a class="nav-item nav-link" href="/consultas">Consultas</a>
        @endif
        @if(Request::path() === 'nueva_cita')
        <a class="nav-item nav-link active" href="/nueva_cita">Programar cita</a>
        @else
        <a class="nav-item nav-link" href="/nueva_cita">Programar cita</a>
        @endif
    </div>
      <a class="nav-item nav-link my-2 my-lg-0 btn btn-success custom-btn" href="/logout">Cerrar sesión</a>
  </div>
</nav>