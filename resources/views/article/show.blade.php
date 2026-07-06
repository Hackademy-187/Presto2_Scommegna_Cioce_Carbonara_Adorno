<x-layout>
    <div style="background-color: #2b1a0e; min-height: 100vh; padding-bottom: 60px;">

        @if (session()->has('message'))
            <div class="container pt-3">
                <div class="alert text-center shadow rounded-pill"
                    style="background-color: #d4a843; color: #1a1a1a; border: none; font-weight: 700; box-shadow: 0 4px 15px rgba(212, 168, 67, 0.2);">
                    {{ session('message') }}
                </div>
            </div>
        @endif

        <div class="container" style="padding-top: 60px; padding-bottom: 40px;">
            <div class="row">
                <div class="col-12 text-center">
                    <span class="section-label text-uppercase fw-semibold"
                        style="color: #d4a843; letter-spacing: 2px; font-size: 13px;">{{ __('ui.productDetail') }}</span>
                    <h1 class="section-title"
                        style="color: #fff; font-family: 'Poppins', sans-serif; font-weight: 700;">
                        {{ $article->title }}
                    </h1>
                    <div class="mx-auto mt-3" style="width: 60px; height: 3px; background-color: #d4a843;"></div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row g-4 align-items-stretch">

                <!-- Colonna Sinistra: Carosello Immagini (Stile griglia/revisore) -->
                <div class="col-12 col-md-8">
                    @if ($article->images->count() > 0)
                        <div id="carouselExample" class="carousel slide h-100 shadow rounded-3 overflow-hidden"
                            style="min-height: 400px; max-height: 550px;">
                            <div class="carousel-inner">
                                @foreach ($article->images as $key => $image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <img src="{{ $image->getUrl(800, 600) }}" class="d-block w-100 rounded shadow"
                                            style="height:550px; object-fit:contain;"
                                            alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                    </div>
                                @endforeach
                            </div>
                            @if ($article->images->count() > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif
                        </div>
                    @else
                        <div class="h-100 d-flex align-items-center justify-content-center rounded-3 shadow"
                            style="background-color: #3d2514; min-height: 400px; max-height: 550px; border: 1px solid rgba(212, 168, 67, 0.15);">
                            <img src="https://picsum.photos/500/500" class="rounded w-100 h-100 object-fit-cover"
                                alt="Nessuna foto inserita dall'utente">
                        </div>
                    @endif
                </div>

                <!-- Colonna Destra: Dettagli Prodotto (Stile Dashboard Revisore) -->
                <div class="col-12 col-md-4 d-flex flex-column justify-content-between"
                    style="background-color: #3d2514; border-radius: 12px; padding: 30px; border-left: 4px solid #d4a843; box-shadow: 0px 10px 30px rgba(0,0,0,0.4); border-top: 1px solid rgba(212, 168, 67, 0.15); border-right: 1px solid rgba(212, 168, 67, 0.15); border-bottom: 1px solid rgba(212, 168, 67, 0.15);">
                    <div>
                        <h2 style="color: #fff; font-family: 'Poppins', sans-serif; font-size: 28px; font-weight: 600;">
                            {{ $article->title }}
                        </h2>

                        <h3 class="mt-2"
                            style="color: #d4a843; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">
                            {{ __('ui.author') }}: {{ $article->user?->name ?? __('ui.anonymous') }}
                        </h3>

                        <div class="my-3">
                            <span class="fw-bold px-3 py-1"
                                style="color: #d4a843; background-color: #1a1a1a; border-radius: 4px; border: 1px solid rgba(212, 168, 67, 0.2); font-size: 18px; display: inline-block;">
                                {{ $article->price }} €
                            </span>
                        </div>

                        <h4 class="fst-italic mb-3" style="color: #b58421; font-size: 15px;">
                            #{{ $article->category->name }}
                        </h4>

                        <hr style="border-top: 1px solid rgba(255, 243, 196, 0.15); margin: 20px 0;">

                        <p style="color: #fff3c4; font-size: 14px; line-height: 1.8; text-align: justify;">
                            {{ $article->description }}
                        </p>
                    </div>

                    <!-- Bottone Torna Indietro fisso in basso -->
                    <div class="mt-4">
                        <a href="{{ route('article.index') }}"
                            class="btn py-2.5 w-100 fw-bold rounded-pill text-center transition-all"
                            style="background-color: #2b1a0e; color: #fff3c4; border: 1px solid rgba(212, 168, 67, 0.3); font-size: 13px; text-transform: uppercase; letter-spacing: 1px; text-decoration: none; display: block;">
                            ← {{ __('ui.goBack') }}
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</x-layout>
