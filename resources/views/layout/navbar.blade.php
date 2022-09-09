<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">Hjem
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reservér</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.show', auth()->user()) }}">Min Profil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">Administrasjon</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Oversikt</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.locations.index') }}">Lokasjoner</a>
                        <a class="dropdown-item" href="#">Ressurser</a>
                        <a class="dropdown-item" href="{{ route('admin.users.index') }}">Brukere</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logg</a>
                    </div>
                </li>
            </ul>
            <div class="d-flex">
                <button class="btn btn-danger mx-2 my-2 my-sm-0" type="submit">Sjekk inn</button>
                <button class="btn btn-success mx-2 my-2 my-sm-0" type="submit">Sjekk ut</button>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn btn-info my-2 my-sm-0" type="submit">
                        Logg ut
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

