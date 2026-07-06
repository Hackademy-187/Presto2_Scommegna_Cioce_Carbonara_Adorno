<div class="presto-card">
    <div class="card-img">
        <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(800, 600) : 'https://picsum.photos/800/600' }}"
            class="card-img-top" alt="Immagine dell'articolo {{ $article->title }}">
    </div>

    <div class="card-body d-flex flex-column justify-content-between">
        <div>
            <h5 class="card-title">{{ $article->title }}</h5>
            <p class="card-price">€ {{ $article->price }}</p>
        </div>

        <!-- Layout verticale, elementi centrati e distanziati -->
        <div class="card-footer-custom d-flex flex-column align-items-center gap-3 mt-3">
            <!-- Bottone centrato a larghezza intera -->
            <a href="{{ route('article.show', compact('article')) }}" class="btn-presto w-100 text-center">
                {{ __('ui.detail') }}
            </a>
            
            <!-- Scritta categoria con più carattere -->
            <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                class="text-decoration-none small fw-semibold text-uppercase tracking-wider text-light opacity-75 transition-hover" 
                style="font-size: 11px; letter-spacing: 0.5px;">
                {{ __('ui.category') }}: <span style="color: #f7a204;">{{ $article->category->name }}</span>
            </a>
        </div>
    </div>
</div>