<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="first-item">
                    <h4>Presto.it</h4>
                    <ul>
                        <li><a href="{{ route('homepage') }}">Homepage</a></li>
                        <li><a href="{{ route('article.index') }}">Articoli</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <h4>Categorie</h4>
                <ul>
                    @foreach ($categories->take(4) as $category)
                        <li>
                            <a href="{{ route('byCategory', ['category' => $category]) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-3">
                <h4>Link Utili</h4>
                <ul>
                    <li><a href="{{ route('homepage') }}">Homepage</a></li>
                    <li><a href="{{ route('article.index') }}">Articoli</a></li>
                    <li><a href="#">Contatti</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h4>Account</h4>
                <ul>
                    @auth
                        <li><a href="{{ route('create.article') }}">Pubblica Annuncio</a></li>
                        <li><a href="#" onclick="event.preventDefault();document.querySelector('#form-logout').submit()">Logout</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Accedi</a></li>
                        <li><a href="{{ route('register') }}">Registrati</a></li>
                    @endauth
                </ul>
            </div>
            <div class="col-md-5 offset-md-1 mb-3 text-center">
                <h5>Vuoi diventare revisore?</h5>
                <p>Cliccando il bottone sottostante farai richiesta al nostro admin</p>
                <a href="{{ route('become.revisor') }}" class="btn btn-success">diventa revisore</a>
            </div>
            <div class="col-lg-12">
                <div class="under-footer">
                    <p>© {{ date('Y') }} Presto.it — Tutti i diritti riservati.</p>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>