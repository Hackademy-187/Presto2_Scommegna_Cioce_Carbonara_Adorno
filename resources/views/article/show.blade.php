<x-layout>
    <div style="background: linear-gradient(135deg, #0d1f1a 0%, #1a3028 100%); min-height: 100vh; padding-bottom: 60px;">
        <div class="container py-5">
            <div class="row mb-5 justify-content-center align-items-center text-center">
                <div class="col-12 col-md-8">
                    <span class="section-label">Dettaglio Prodotto</span>
                    <h1 class="display-4 fw-bold mt-2" style="color: #fff; font-family: 'Poppins', sans-serif;">{{ $article->title }}</h1>
                    <div class="mx-auto mt-3" style="width: 60px; height: 3px; background-color: #d4a843;"></div>
                </div>
            </div>

            <!-- Modificato: aggiunto align-items-stretch per forzare la stessa altezza delle colonne su desktop -->
            <div class="row justify-content-center g-5 align-items-stretch">
                
                <div class="col-12 col-md-6">
                    <!-- Modificato: aggiunto h-100 per estendere il carosello a tutta l'altezza della colonna -->
                    <div id="carouselExample" class="carousel slide overflow-hidden h-100 d-flex flex-column" style="box-shadow: 0px 0px 30px rgba(0,0,0,0.3); border-radius: 8px;">
                        <!-- Modificato: w-100 e flex-grow-1 per riempire lo spazio verticale disponibile -->
                        <div class="carousel-inner w-100 flex-grow-1 h-100">
                            <div class="carousel-item active h-100">
                                <!-- Modificato: object-fit: cover e h-100 permettono all'immagine di riempire lo spazio senza distorcersi -->
                                <img src="https://picsum.photos/600/500?random=1" class="d-block w-100 h-100" alt="Immagine {{$article->title}}" style="object-fit: cover;">
                            </div>
                            <div class="carousel-item h-100">
                                <img src="https://picsum.photos/600/500?random=2" class="d-block w-100 h-100" alt="Immagine {{$article->title}}" style="object-fit: cover;">
                            </div>
                            <div class="carousel-item h-100">
                                <img src="https://picsum.photos/600/500?random=3" class="d-block w-100 h-100" alt="Immagine {{$article->title}}" style="object-fit: cover;">
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
                    <div class="p-4 p-lg-5 h-100 d-flex flex-column justify-content-between" style="background-color: #0d1f1a; border: 1px solid #1a3028; border-radius: 8px; border-left: 3px solid #d4a843;">
                        <div>
                            <h2 class="h3 fw-bold mb-3" style="color: #fff; font-family: 'Poppins', sans-serif;">{{ $article->title }}</h2>
                            
                            <div class="mb-4">
                                <span class="fs-3 fw-bold px-3 py-2" style="color: #d4a843; background-color: #1a3028; border-radius: 4px;">
                                    {{ $article->price }} €
                                </span>
                            </div>
                            
                            <hr style="border-top: 1px solid #1a3028;">
                            
                            <h5 class="fw-bold mb-3" style="color: #d4a843;">Descrizione</h5>
                            <p style="color: #aaa; line-height: 1.8; font-size: 14px; text-align: justify;">
                                {{ $article->description }}
                            </p>
                        </div>
                        
                        <div class="mt-5">
                            <a href="{{ route('article.index') }}" class="main-dark-button">
                                ← Torna indietro
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-layout>