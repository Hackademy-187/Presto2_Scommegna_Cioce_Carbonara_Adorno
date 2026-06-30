<x-layout>
    <div style="background: linear-gradient(135deg, #1c483c 0%, #1a3028 100%); min-height: 100vh; padding-bottom: 60px;">
        
        @if (session()->has('message'))
            <div class="container pt-3">
                <div class="alert text-center shadow rounded" style="background-color: #d4a843; color: #fff; border: none; font-weight: 600;">
                    {{ session('message') }}
                </div>
            </div>
        @endif

        <!-- Header dashboard -->
        <div class="container" style="padding-top: 60px; padding-bottom: 40px; border-bottom: 1px solid #1a3028;">
            <div class="row">
                <div class="col-12 text-center">
                    <span class="section-label">Area riservata</span>
                    <h1 class="section-title" style="color: #fff;">Revisor Dashboard</h1>
                    <div class="section-divider"></div>
                </div>
            </div>
        </div>

        @if ($article_to_check)
            <div class="container" style="padding-top: 50px;">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-7">
                        <div class="row">
                            @for ($i = 0; $i < 6; $i++)
                                <div class="col-6 col-md-4 mb-3">
                                    <img src="https://picsum.photos/300"
                                        class="img-fluid rounded shadow w-100"
                                        alt="immagine segnaposto"
                                        style="height: 150px; object-fit: cover;">
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="col-12 col-md-4 ps-4 d-flex flex-column justify-content-between" style="background-color: #0d1f1a; border-radius: 12px; padding: 30px; border-left: 3px solid #d4a843;">
                        <div>
                            <h1 style="color: #fff; font-family: 'Poppins', sans-serif;">{{ $article_to_check->title }}</h1>
                            <h3 style="color: #d4a843; font-size: 16px;">Autore: {{ $article_to_check->user?->name ?? 'Anonimo' }}</h3>
                            <h4 style="color: #d4a843;">{{ $article_to_check->price }}€</h4>
                            <h4 class="fst-italic" style="color: #aaa;">#{{ $article_to_check->category->name }}</h4>
                            <p style="color: #aaa; font-size: 14px; line-height: 1.8;">{{ $article_to_check->description }}</p>
                        </div>
                        <div class="d-flex pb-4 justify-content-around mt-4">
                            <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn py-2 px-5 fw-bold" style="background-color: #e74c3c; color: #fff; border-radius: 4px;">Rifiuta</button>
                            </form>
                            <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn py-2 px-5 fw-bold" style="background-color: #d4a843; color: #fff; border-radius: 4px;">Accetta</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container" style="padding-top: 100px; text-align: center;">
                <span class="section-label">Tutto in ordine</span>
                <h1 class="fst-italic" style="color: #fff; font-size: 42px; margin: 20px 0;">Nessun articolo da revisionare</h1>
                <div class="main-border-button d-inline-block mt-3">
                    <a href="{{ route('homepage') }}">Torna all'homepage</a>
                </div>
            </div>
        @endif

        <!-- Annulla ultima operazione - sempre visibile -->
        <div class="container text-center mt-4">
            <form action="{{ route('revisor.undo') }}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn py-2 px-5 fw-bold" style="background-color: #555; color: #fff; border-radius: 4px;">↩ Annulla ultima operazione</button>
            </form>
        </div>

    </div>
</x-layout>