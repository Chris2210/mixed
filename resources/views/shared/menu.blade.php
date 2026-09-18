 <header class="pb-3 mb-4 border-bottom">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('dashboard')}}">Inicio <span class="sr-only">(current)</span></a>
      </li>
    <?php if(Auth::user()->userRole == 'SUPERADMIN'){?>
      <li class="nav-item">
        <a class="nav-link" href="{{url('usuarios')}}">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('teams')}}">Equipos</a>
      </li>
    <?php } else if(Auth::user()->userRole == 'LEADER' || Auth::user()->userRole == 'ADMIN'){ ?>

      <li class="nav-item">
        <a class="nav-link" href="{{url('usuariosteam/'.Auth::user()->team_id.'')}}">Usuarios</a>
      </li>

    <?php } ?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Hola {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </div>
  </div>
</nav>

    </header>
