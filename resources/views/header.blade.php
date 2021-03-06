<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
  
        <a class="navbar-brand" href="{{ url('/') }}">LARABLOG</a>
  
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                
                @if(auth()->guest())

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/inscription') }}">Inscription</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/connexion') }}">Connexion</a>
                    </li>

                @else

                    <li class="nav-item">
                        <a class="btn btn-outline-primary" href="{{ url('/create_post') }}">Créer un Post</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profile') }}">Mon Compte</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/users') }}">Utilisateurs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/signout') }}">Déconnexion</a>
                    </li>

                @endif

                
            </ul>
        </div>
    </div>
</nav>