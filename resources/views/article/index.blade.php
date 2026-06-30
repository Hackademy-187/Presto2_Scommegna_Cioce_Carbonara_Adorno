<x-layout>
    <div style="background: linear-gradient(135deg, #f7a204 0%, #130c00d7 100%); min-height: 100vh;">
        <div class="container">
            <div class="row justify-content-center align-items-center text-center"
                style="padding-top: 60px; padding-bottom: 40px;">
                <div class="col-12">
                    <span class="section-label">Scopri i nostri annunci</span>
                    <h1 class="display-4 fw-bold mt-2" style="color: #fff; font-family: 'Poppins', sans-serif;">
                        Tutti gli Articoli
                    </h1>
                    <div class="mx-auto mt-3" style="width: 60px; height: 3px; background-color: #d4a843;"></div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center py-5">
                @forelse ($articles as $article)
                    <div class="col-12 col-md-3">
                        <x-card :article="$article" />
                    </div>
                @empty
                    <div class="col-12">
                        <h2 class="text-center" style="color: #aaa; font-family: 'Poppins', sans-serif;">Nessun articolo
                            trovato</h2>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="d-flex justify-content-center" style=" padding-top: 30px; padding-bottom: 30px;">
            <div>
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</x-layout>
