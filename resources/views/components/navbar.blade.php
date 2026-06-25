<header class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="{{ route('homepage') }}" class="logo">
                        <img class="logonav" src="{{ asset('/storage/images/logo.png') }}" alt="Logo Presto">
                    </a>
                    </a>
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
                            <li class="submenu">
                                <a href="javascript:;">Ciao, {{ Auth::user()->name }}</a>
                                <ul>
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li><a href="{{ route('create.article') }}">Crea</a></li>
                                    <li>
                                        <a href="#"
                                            onclick="event.preventDefault();document.querySelector('#form-logout').submit()">
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
