    <div class="presto-card">
        <div class="card-img" style="height: 200px; overflow: hidden;">
            <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(400, 400) : 'https://picsum.photos/200' }}"
                class="card-img-top" alt="Immagine dell'articolo {{ $article->title }}">

        </div>

        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>
            <p class="card-price">€ {{ $article->price }}</p>

            <div class="card-footer-custom">
                <a href="{{ route('article.show', compact('article')) }}" class="btn-presto">
                    {{ __('ui.detail') }}
                </a>
                <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                    class="text-decoration-none small fw-medium" style="color: #aaa; font-size: 12px;">
                    {{ __('ui.category') }}: <strong>{{ $article->category->name }}</strong>
                </a>
            </div>
        </div>
    </div>
