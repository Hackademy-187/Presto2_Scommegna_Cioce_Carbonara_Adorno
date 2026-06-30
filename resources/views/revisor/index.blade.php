<x-layout>
    <!-- Sfondo uniforme Stout Scuro (#2b1a0e) per evitare il bianco e mantenere la coerenza con il sito -->
    <div style="background-color: #2b1a0e; min-height: 100vh; padding-bottom: 60px;">
        
        @if (session()->has('message'))
            <div class="container pt-3">
                <div class="alert text-center shadow rounded-pill" style="background-color: #d4a843; color: #1a1a1a; border: none; font-weight: 700; box-shadow: 0 4px 15px rgba(212, 168, 67, 0.2);">
                    {{ session('message') }}
                </div>
            </div>
        @endif

        <!-- Header dashboard -->
        <div class="container" style="padding-top: 60px; padding-bottom: 40px;">
            <div class="row">
                <div class="col-12 text-center">
                    <span class="section-label">Area riservata</span>
                    <h1 class="section-title" style="color: #fff; font-family: 'Poppins', sans-serif; font-weight: 700;">Revisor Dashboard</h1>
                    <div class="mx-auto mt-3" style="width: 60px; height: 3px; background-color: #d4a843;"></div>
                </div>
            </div>
        </div>

        @if ($article_to_check)
            <div class="container" style="padding-top: 20px;">
                <div class="row justify-content-center g-4">
                    
                    <!-- Griglia Immagini -->
                    <div class="col-12 col-md-7">
                        <div class="row">
                            @for ($i = 0; $i < 6; $i++)
                                <div class="col-6 col-md-4 mb-3">
                                    <img src="https://picsum.photos/300"
                                        class="img-fluid rounded shadow w-100"
                                        alt="immagine segnaposto"
                                        style="height: 150px; object-fit: cover; border: 1px solid rgba(212, 168, 67, 0.1);">
                                </div>
                            @endfor
                        </div>
                    </div>
                    
                    <!-- Scheda Dettagli Revisione -->
                    <div class="col-12 col-md-4 d-flex flex-column justify-content-between" style="background-color: #3d2514; border-radius: 12px; padding: 30px; border-left: 4px solid #d4a843; box-shadow: 0px 10px 30px rgba(0,0,0,0.4); border-top: 1px solid rgba(212, 168, 67, 0.15); border-right: 1px solid rgba(212, 168, 67, 0.15); border-bottom: 1px solid rgba(212, 168, 67, 0.15);">
                        <div>
                            <h1 style="color: #fff; font-family: 'Poppins', sans-serif; font-size: 28px; font-weight: 600;">{{ $article_to_check->title }}</h1>
                            <h3 class="mt-2" style="color: #d4a843; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">Autore: {{ $article_to_check->user?->name ?? 'Anonimo' }}</h3>
                            
                            <div class="my-3">
                                <span class="fw-bold px-3 py-1" style="color: #d4a843; background-color: #1a1a1a; border-radius: 4px; border: 1px solid rgba(212, 168, 67, 0.2); font-size: 18px; display: inline-block;">
                                    {{ $article_to_check->price }} €
                                </span>
                            </div>
                            
                            <h4 class="fst-italic mb-3" style="color: #b58421; font-size: 15px;">#{{ $article_to_check->category->name }}</h4>
                            <p style="color: #fff3c4; font-size: 14px; line-height: 1.8; text-align: justify;">{{ $article_to_check->description }}</p>
                        </div>
                        
                        <!-- Pulsanti d'azione arrotondati -->
                        <div class="d-flex justify-content-between gap-2 mt-4">
                            <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST" class="w-50">
                                @csrf
                                @method('PATCH')
                                <button class="btn py-2.5 w-100 fw-bold rounded-pill" style="background-color: #ff5c5c; color: #1a1a1a; font-size: 14px; text-transform: uppercase; letter-spacing: 1px; border: none;">Rifiuta</button>
                            </form>
                            <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST" class="w-50">
                                @csrf
                                @method('PATCH')
                                <button class="btn py-2.5 w-100 fw-bold rounded-pill" style="background-color: #d4a843; color: #1a1a1a; font-size: 14px; text-transform: uppercase; letter-spacing: 1px; border: none;">Accetta</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @else
            <!-- Schermata di Coda Vuota -->
            <div class="container" style="padding-top: 100px; text-align: center;">
                <span class="section-label">Tutto in ordine</span>
                <h1 class="fst-italic" style="color: #fff; font-size: 38px; margin: 20px 0;">Nessun articolo da revisionare</h1>
                <div class="main-border-button d-inline-block mt-3">
                    <a href="{{ route('homepage') }}" class="btn px-5 py-2.5 rounded-pill" style="color: #d4a843; border: 1px solid #d4a843; text-decoration: none; text-transform: uppercase; font-size: 13px; font-weight: 600; background-color: transparent; transition: all 0.3s;">Torna all'homepage</a>
                </div>
            </div>
        @endif

        <!-- Annulla ultima operazione (Senza icona, arrotondato e con sfondo scuro integrato) -->
        <div class="container text-center mt-5">
            <form action="{{ route('revisor.undo') }}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn py-2.5 px-5 fw-bold rounded-pill" style="background-color: #3d2514; color: #fff3c4; border: 1px solid rgba(212, 168, 67, 0.3); font-size: 13px; text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s;">
                    Annulla ultima operazione
                </button>
            </form>
        </div>

    </div>
</x-layout>