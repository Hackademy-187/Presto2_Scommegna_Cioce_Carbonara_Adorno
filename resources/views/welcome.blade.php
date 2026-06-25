<x-layout>
    <div class="container-fluid text-center bg-body-tertiary">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-md-12">
                <h1 class="display-4">Presto.it</h1>
                <div class="my-3 mb-1">
                    @auth
                        <a class="btn btn-dark" href="{{ route('create.article') }}">Pubblica un articolo</a>
                    @endauth
                </div>
            </div>
        </div>
        <div class="row height-custom justify-content-center align-items-center py-3">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h2 class="text-center">Nessun articolo trovato</h2>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>