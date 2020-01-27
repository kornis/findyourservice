<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="mr-auto">
    <a class="navbar-brand" href="/">FindYourService.com</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse derecha" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        @if(!Auth::user())
        <li class="nav-item">
          <a class="nav-link" href="/login">Iniciar Sesion</a>
        </li>
        @endif
        <li class="nav-item dropdown">
          @if (Auth::user())
              
          
          <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Usuario
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(Auth::user()->type_user == 'Admin')
            <a class="dropdown-item" href="/services">ABM Servicios</a>
            
            <div class="dropdown-divider"></div>
            @endif
            <a class="dropdown-item" href="/logout">Cerrar Sesion</a>
          </div>
          @endif
        </li>

      </ul>

    </div>
  </nav>