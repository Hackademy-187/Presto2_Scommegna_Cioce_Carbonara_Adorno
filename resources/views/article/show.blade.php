<x-layout>
    <div class="container py-5">
        <div class="row mb-5 justify-content-center align-items-center text-center">
            <div class="col-12 col-md-8">
                <span class="text-uppercase text-muted small fw-bold tracking-wider">Dettaglio Prodotto</span>
                <h1 class="display-4 fw-bold text-dark mt-2">{{ $article->title }}</h1>
                <div class="mx-auto bg-primary rounded" style="width: 60px; height: 4px;"></div>
            </div>
        </div>

        <div class="row justify-content-center g-5 align-items-start">
            
            <div class="col-12 col-md-6">
                <div id="carouselExample" class="carousel slide shadow-lg rounded-4 overflow-hidden">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/600/500?random=1" class="d-block w-100" alt="Immagine {{$article->title}}" style="max-height: 450px; object-fit: cover;">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/600/500?random=2" class="d-block w-100" alt="Immagine {{$article->title}}" style="max-height: 450px; object-fit: cover;">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/600/500?random=3" class="d-block w-100" alt="Immagine {{$article->title}}" style="max-height: 450px; object-fit: cover;">
                        </div>
                    </div>
                    
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="bg-light p-4 p-lg-5 rounded-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <h2 class="h3 fw-bold text-dark mb-3">{{ $article->title }}</h2>
                        
                        <div class="mb-4">
                            <span class="fs-3 fw-extrabold text-success bg-success-subtle px-3 py-2 rounded-3 border border-success-subtle">
                                {{ $article->price }} €
                            </span>
                        </div>
                        
                        <hr class="text-muted my-4">
                        
                        <h5 class="fw-bold text-secondary mb-3">Descrizione</h5>
                        <p class="text-body-secondary lh-lg fs-5 mb-0" style="text-align: justify;">
                            {{ $article->description }}
                        </p>
                    </div>
                    
                    <div class="mt-5">
                        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary px-4 rounded-pill">
                            <i class="bi bi-arrow-left me-2"></i>Torna indietro
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-layout>