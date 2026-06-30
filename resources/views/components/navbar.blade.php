<header class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">

                    <!-- LOGO COMPLESSIVO -->
                    <a href="{{ route('homepage') }}" class="logo">
                        <img class="logonav" src="{{ asset('/storage/images/logo.png') }}" alt="Logo Subirra">
                        <span class="logo-text">Subirra.it</span>
                    </a>

                    <!-- CONTENITORE DESTRO (MENU + SEARCH) -->
                    <div class="nav-container-right">
                        <ul class="nav">
                            <li><a href="{{ route('homepage') }}">Home</a></li>
                            <li><a href="{{ route('article.index') }}">Articoli</a></li>

                            <li class="submenu">
                                <a href="javascript:;">Categorie</a>
                                <ul>
                                    @foreach ($categories as $category)
                                        <li>
                                            <a class="text-capitalize"
                                                href="{{ route('byCategory', ['category' => $category]) }}">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                            @auth
                                @if (Auth::user()->is_revisor)
                                    <li class="nav-item">
                                        <a class="position-relative" href="{{ route('revisor.index') }}">
                                            Zona revisore
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                {{ \App\Models\Article::toBeRevisedCount() }}
                                            </span>
                                        </a>
                                    </li>
                                @endif

                                <li class="submenu">
                                    <a href="javascript:;">Ciao, {{ Auth::user()->name }}</a>
                                    <ul>
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li><a href="{{ route('create.article') }}">Crea</a></li>
                                        @if (Auth::user()->is_revisor)
                                            <li><a href="{{ route('revisor.index') }}">Zona revisore</a></li>
                                        @endif
                                        <li>
                                            <a href="#"
                                                onclick="event.preventDefault(); document.querySelector('#form-logout').submit()">
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="submenu">
                                    <a href="javascript:;">Ciao, utente!</a>
                                    <ul>
                                        <li><a href="{{ route('login') }}">Accedi</a></li>
                                        <li><a href="{{ route('register') }}">Registrati</a></li>
                                    </ul>
                                </li>
                            @endauth
                        </ul>

                        <!-- BARRA DI RICERCA -->
                        <form class="search-form-nav" role="search" action="{{ route('article.search') }}"
                            method="GET">
                            <div class="input-group input-group-sm">
                                <input type="search" name="query" class="form-control" placeholder="Cerca..."
                                    aria-label="search">
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                        <a class="menu-trigger">
                            <span>Menu</span>
                        </a>

                </nav>
            </div>
        </div>
    </div>
</header>

<form action="{{ route('logout') }}" method="POST" id="form-logout" class="d-none">
    @csrf
</form>
