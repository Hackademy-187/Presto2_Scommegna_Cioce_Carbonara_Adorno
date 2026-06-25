<div class="card h-100 mx-auto card-w shadow-sm text-center mb-4 rounded-4 border-0 overflow-hidden">
    <div class="p-3 d-flex justify-content-center">
        <img src="https://picsum.photos/250/250" class="img-fluid rounded-3" alt="Immagine dell'articolo {{$article->title}}" style="max-height: 180px; object-fit: cover;">
    </div>
    
    <div class="card-body d-flex flex-column p-4">
        <h5 class="card-title fw-bold text-dark mb-1">{{$article->title}}</h5>
        <h6 class="card-subtitle fw-semibold text-success mb-4">{{$article->price}}</h6>
        
        <div class="mt-auto">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary px-4 rounded-pill shadow-sm">Dettaglio</a>
                
                <a href="{{ route('byCategory', ['category' => $article->category]) }}" class="text-decoration-none text-secondary small fw-medium"> 
                    {{-- {{ $article->category->name }} --}}
                    Categoria
                </a>
            </div>
        </div>
    </div>
</div>