<nav class="navbar navbar-expand-md navbar-dark bg-dark text-white">
    <div class="container">
        <a class="navbar-brand" href="/">CRUD PHP</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/clientes">Clientes <span class="visually-hidden">(current)</span></a>
                </li>
            </ul>
            @if (isset($hideSF) == false)
                <form class="d-flex my-2 my-lg-0">
                    <input class="form-control me-sm-2" type="text" name="search" value="{{ $search ?? '' }}"
                        placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            @endif
            @if (Auth::check())
                <div class="dropdown open ms-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mi cuenta
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <p class="dropdown-item text-dark">{{ Auth::user()->name }}</p>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item" id="logout">Cerrar sesion</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</nav>
