<x-layout>

    @if (session()->has('errorMessage'))
    <div class="alert alert-danger text-center shadow rounded w-50">
        {{ session('errorMessage') }}
    </div>
    @endif



    @if (session()->has('message'))
    <div class="alert alert-success text-center shadow rounded w-50">
        {{ session('message') }}
    </div>
    @endif



    <!-- Tutta la pagina con sfondo scuro -->
    <div style="background: linear-gradient(135deg, #1c483c 0%, #1a3028 100%); min-height: 100vh;">
        
        <!-- Banner principale -->
        <div style="min-height: 65vh; display: flex; align-items: center; justify-content: center; text-align: center;">
            <div>
                <span class="section-label">Benvenuto su</span>
                <h1 style="color: #fff; font-family: 'Poppins', sans-serif; font-size: 72px; font-weight: 800; margin: 15px 0; letter-spacing: -2px;">Subirra.it</h1>
                <p style="color: #888; font-size: 16px; margin-bottom: 35px; letter-spacing: 1px;">Il marketplace italiano per i tuoi annunci</p>
                <div class="my-3">
                    @auth
                        <div class="main-border-button d-inline-block">
                            <a href="{{ route('create.article') }}">Pubblica un annuncio</a>
                        </div>
                    @else
                        <div class="main-border-button d-inline-block">
                            <a href="{{ route('register') }}">Inizia ora</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Ultimi articoli -->
        <div class="container" style="padding-top: 60px; padding-bottom: 80px;">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <span class="section-label">Scopri</span>
                    <h2 class="section-title" style="color: #fff;">Ultimi Annunci</h2>
                    <div class="section-divider"></div>
                </div>
            </div>
            <div class="row justify-content-center py-3">
                @forelse ($articles as $article)
                    <div class="col-12 col-md-4 col-lg-3">
                        <x-card :article="$article" />
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <h2 style="color: #aaa;">Nessun articolo trovato</h2>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</x-layout>