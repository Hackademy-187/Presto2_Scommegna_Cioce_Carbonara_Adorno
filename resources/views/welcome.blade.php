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

    <div style="background: linear-gradient(135deg, #f7a204 0%, #130c00d7 100%); min-height: 100vh;">

        <div id="beer-hero" class="hero-section">

            <div class="beer-bg" id="beer-liquid" style="background-image: url('{{ asset('storage/images/hero-beer.jpg') }}');"></div>

            <div class="beer-foam-layer" id="beer-foam"></div>

            <div class="hero-overlay"></div>

            <div class="hero-content">
                <span class="section-label">{{ __('ui.welcome') }}</span>
               <div class="hero-title-wrapper">
    <img 
        class="hero-title-logo" 
        src="{{ asset('/storage/images/logo.png') }}" 
        alt="Logo Subirra"
    >

    <h1 class="hero-title">Subirra.it</h1>
</div>
                <p class="hero-subtitle">{{ __('ui.marketplace') }}</p>

                <div class="my-4">
                    @auth
                        <div class="main-border-button d-inline-block">
                            <a href="{{ route('create.article') }}">{{ __('ui.publish') }}</a>
                        </div>
                    @else
                        <div class="main-border-button d-inline-block">
                            <a href="{{ route('register') }}">{{ __('ui.register') }}</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>

        <!-- ULTIMI ANNUNCI -->
        <div class="container py-5">

            <div class="row text-center mb-5">
                <div class="col-12">
                    <span class="section-label">{{ __('ui.discover') }}</span>
                    <h2 class="section-title text-white">{{ __('ui.latestAds') }}</h2>
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
                        <h2 style="color: #aaa;">{{ __('ui.noArticles') }}</h2>
                    </div>
                @endforelse
            </div>

        </div>

    </div>

</x-layout>