<nav class="navbar navbar-expand-lg navbar-custom bg-custom">
  <a class="navbar-brand" href="/app">Consultorio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        @if(Request::path() === 'app')
          <a class="nav-item nav-link active" href="/app">Citas</a>
        @else
        <a class="nav-item nav-link" href="/app">Citas</a>
        @endif
        @if(Request::path() === 'consultas')
        <a class="nav-item nav-link active" href="/consultas">Consultas</a>
        @else
        <a class="nav-item nav-link" href="/consultas">Consultas</a>
        @endif
        @if(Request::path() === 'nueva_cita')
        <a class="nav-item nav-link active" href="/nueva_cita">Programar cita</a>
        @else
        <a class="nav-item nav-link" href="/nueva_cita">Programar cita</a>
        @endif
      <a class="nav-item nav-link" href="/logout">Cerrar sesión</a>
    </div>
  </div>
</nav>