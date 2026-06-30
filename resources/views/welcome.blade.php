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

    <div style="background: linear-gradient(135deg, #1c483c 0%, #1a3028 100%); min-height: 100vh;">

<!-- HERO SECTION EFFETTO iBEER CON SCHIUMA -->
<div id="beer-hero" class="hero-section">

    <!-- Il livello della birra bionda -->
    <div class="beer-bg" id="beer-liquid" style="background-image: url('{{ asset('storage/images/hero-beer.jpg') }}');"></div>

    <!-- NUOVO: Il livello della schiuma che si muove sopra la birra -->
    <div class="beer-foam-layer" id="beer-foam"></div>

    <div class="hero-overlay"></div>

    <div class="hero-content">
        <span class="section-label">Benvenuto su</span>
        <h1 class="hero-title">Subirra.it</h1>
        <p class="hero-subtitle">Il marketplace italiano per i tuoi annunci</p>

        <div class="my-4">
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

        <!-- ULTIMI ANNUNCI -->
        <div class="container py-5">

            <div class="row text-center mb-5">
                <div class="col-12">

                    <span class="section-label">
                        Scopri
                    </span>

                    <h2 class="section-title text-white">
                        Ultimi Annunci
                    </h2>

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
                        <h2 style="color: #aaa;">
                            Nessun articolo trovato
                        </h2>
                    </div>
                @endforelse

            </div>

        </div>

    </div>

</x-layout>
