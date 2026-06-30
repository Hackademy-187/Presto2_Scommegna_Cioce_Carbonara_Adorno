<x-layout>

    <div style="background: linear-gradient(135deg, #f7a204 0%, #130c00d7 100%); min-height: 100vh;">

        <!-- HEADER CATEGORIA -->
        <section class="category-hero pt-5 pb-4 text-center" style="margin-top: 50px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">

                        <span class="section-label d-block mb-2">
                            Categoria
                        </span>

                        <h1 class="category-title text-light display-4 fw-bold">
                            {{ $category->name }}
                        </h1>

                        <p class="category-subtitle text-light opacity-75 fs-5">
                            Scopri tutti gli annunci disponibili
                        </p>

                    </div>
                </div>
            </div>
        </section>

        <!-- ARTICOLI -->
        <div class="container pb-5">

            <div class="row justify-content-center">

                @forelse ($articles as $article)
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <x-card :article="$article" />
                    </div>

                @empty

                    <div class="col-12 text-center py-5">

                        <h2 class="empty-category text-light">
                            Nessun articolo trovato
                        </h2>

                        <p class="text-light mb-4 opacity-75">
                            Questa categoria è ancora vuota.
                        </p>

                        @auth
                            <div class="main-border-button">
                                <a href="{{ route('create.article') }}" class="btn btn-outline-light">
                                    Pubblica un articolo
                                </a>
                            </div>
                        @endauth

                    </div>
                @endforelse

            </div>

        </div>

    </div>

</x-layout>
