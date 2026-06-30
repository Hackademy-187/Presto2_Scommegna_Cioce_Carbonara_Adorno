<x-layout>
    <div style="background: linear-gradient(135deg, #f7a204 0%, #130c00d7 100%); min-height: 100vh;">
        <div class="container py-5">
            <div class="row mb-5 justify-content-center align-items-center text-center">
                <div class="col-12 col-md-8">
                    <span class="section-label">Dettaglio Prodotto</span>
                    <h1 class="display-4 fw-bold mt-2" style="color: #fff; font-family: 'Poppins', sans-serif;">{{ $article->title }}</h1>
                    <div class="mx-auto mt-3" style="width: 60px; height: 3px; background-color: #d4a843;"></div>
                </div>
            </div>

            <div class="row justify-content-center g-5 align-items-stretch">
                
                <div class="col-12 col-md-6">
                    <div id="carouselExample" class="carousel slide overflow-hidden h-100 d-flex flex-column" style="box-shadow: 0px 10px 30px rgba(0,0,0,0.5); border-radius: 8px; border: 1px solid rgba(212, 168, 67, 0.15);">
                        <div class="carousel-inner w-100 flex-grow-1 h-100">
                            <div class="carousel-item active h-100">
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
                    <div class="p-4 p-lg-5 h-100 d-flex flex-column justify-content-between" style="background-color: #3d2514; border: 1px solid rgba(212, 168, 67, 0.15); border-radius: 8px; border-left: 4px solid #d4a843; box-shadow: 0px 10px 30px rgba(0,0,0,0.4);">
                        <div>
                            <h2 class="h3 fw-bold mb-3" style="color: #fff; font-family: 'Poppins', sans-serif;">{{ $article->title }}</h2>
                            
                            <div class="mb-4">
                                <span class="fs-3 fw-bold px-3 py-2" style="color: #d4a843; background-color: #2b1a0e; border-radius: 6px; border: 1px solid rgba(212, 168, 67, 0.2); display: inline-block;">
                                    {{ $article->price }} €
                                </span>
                            </div>
                            
                            <hr style="border-top: 1px solid rgba(255, 243, 196, 0.15);">
                            
                            <h5 class="fw-bold mb-3" style="color: #d4a843; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Descrizione</h5>
                            <p style="color: #fff3c4; line-height: 1.8; font-size: 15px; text-align: justify; margin-bottom: 0;">
                                {{ $article->description }}
                            </p>
                        </div>
                        
                        <div class="mt-5">
                            <a href="{{ route('article.index') }}" class="main-dark-button" style="text-transform: uppercase; font-size: 12px; letter-spacing: 1px;">
                                ← Torna indietro
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-layout>