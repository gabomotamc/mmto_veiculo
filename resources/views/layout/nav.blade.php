  <body>

 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> Manutenção do veículos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <!--<li class="nav-item">
          <a class="nav-link" aria-current="page" href="#"> 
           Home
          </a>
        </li>-->

        @if( Auth::check() )

          <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Meus veículos
            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ route('criarVeiculo') }}">Cadastar veículo</a></li>

              <li><hr class="dropdown-divider"></li>

              <li><a class="dropdown-item" href="{{ route('indexVeiculo') }}">Veículos cadastrados</a></li>
            </ul>

          </li>        

          <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Agendamento manutenção
            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ route('criarAgendamento') }}">Cadastar agendamento</a></li>

              <li><hr class="dropdown-divider"></li>

              <li>
                <a class="dropdown-item" href="{{ route('indexAgendamento') }}">
                  Meus agendamentos
                </a>
            </li>
            </ul>

          </li>          

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('fecharSessao') }}"> 

           Fechar Sessão
          </a>
        </li>

      <form class="d-flex">
        <!--
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
        <button class="btn btn-outline-success" type="button">
        Usuario: {{ Auth::user()->nome }}
        </button>
      
      </form>
        @else

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('criarUsuario') }}"> 
           Cadastro usuario
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('loginUsuario') }}"> 
           Login
          </a>
        </li>

        @endif

      </ul>

    
    </div>
  </div>
</nav>   