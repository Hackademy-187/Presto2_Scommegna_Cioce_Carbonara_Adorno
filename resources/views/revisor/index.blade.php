<x-layout>
    <div style="background-color: #2b1a0e; min-height: 100vh; padding-bottom: 60px;">

        @if (session()->has('message'))
            <div class="container pt-3">
                <div class="alert text-center shadow rounded-pill"
                    style="background-color: #d4a843; color: #1a1a1a; border: none; font-weight: 700; box-shadow: 0 4px 15px rgba(212, 168, 67, 0.2);">
                    {{ session('message') }}
                </div>
            </div>
        @endif

        <div class="container" style="padding-top: 60px; padding-bottom: 40px;">
            <div class="row">
                <div class="col-12 text-center">
                    <span class="section-label">{{ __('ui.reservedArea') }}</span>
                    <h1 class="section-title" style="color: #fff; font-family: 'Poppins', sans-serif; font-weight: 700;">
                        {{ __('ui.revisorDashboard') }}
                    </h1>
                    <div class="mx-auto mt-3" style="width: 60px; height: 3px; background-color: #d4a843;"></div>
                </div>
            </div>
        </div>

        @if ($article_to_check)
            <div class="container">
                <div class="row g-4 align-items-stretch">

                    <div class="col-12 col-md-8">
                        <div class="row">

                            @if ($article_to_check->images->count())
                                @foreach ($article_to_check->images as $key => $image)
                                    <div class="col-12 mb-4">
                                        <div class="card border-0 shadow"
                                            style="background-color: #3d2514; color: #fff3c4; border-radius: 12px; overflow: hidden; border: 1px solid rgba(212, 168, 67, 0.2) !important;">

                                            <div class="row g-0">

                                                <div class="col-12 col-md-4">
                                                    <img src="{{ $image->getUrl(800, 600) }}" class="img-fluid w-100"
                                                        style="height:250px; object-fit:contain;"
                                                        alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title }}'">
                                                </div>

                                                <div class="col-12 col-md-4">
                                                    <div class="card-body">
                                                        <h5 style="color: #d4a843; font-weight: 700;">
                                                            Labels
                                                        </h5>

                                                        @if ($image->labels)
                                                            @foreach ($image->labels as $label)
                                                                <span class="badge me-1 mb-2"
                                                                    style="background-color: #1a1a1a; color: #d4a843; border: 1px solid rgba(212, 168, 67, 0.3);">
                                                                    {{ $label }}
                                                                </span>
                                                            @endforeach
                                                        @else
                                                            <p class="fst-italic" style="color: #fff3c4;">
                                                                Analisi labels in corso...
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-4">
                                                    <div class="card-body">
                                                        <h5 style="color: #d4a843; font-weight: 700;">
                                                            Ratings
                                                        </h5>

                                                        <div class="row align-items-center mb-2">
                                                            <div class="col-2">
                                                                <i
                                                                    class="{{ $image->adult ?? 'text-secondary bi bi-circle-fill' }}"></i>
                                                            </div>
                                                            <div class="col-10">adult</div>
                                                        </div>

                                                        <div class="row align-items-center mb-2">
                                                            <div class="col-2">
                                                                <i
                                                                    class="{{ $image->violence ?? 'text-secondary bi bi-circle-fill' }}"></i>
                                                            </div>
                                                            <div class="col-10">violence</div>
                                                        </div>

                                                        <div class="row align-items-center mb-2">
                                                            <div class="col-2">
                                                                <i
                                                                    class="{{ $image->spoof ?? 'text-secondary bi bi-circle-fill' }}"></i>
                                                            </div>
                                                            <div class="col-10">spoof</div>
                                                        </div>

                                                        <div class="row align-items-center mb-2">
                                                            <div class="col-2">
                                                                <i
                                                                    class="{{ $image->racy ?? 'text-secondary bi bi-circle-fill' }}"></i>
                                                            </div>
                                                            <div class="col-10">racy</div>
                                                        </div>

                                                        <div class="row align-items-center mb-2">
                                                            <div class="col-2">
                                                                <i
                                                                    class="{{ $image->medical ?? 'text-secondary bi bi-circle-fill' }}"></i>
                                                            </div>
                                                            <div class="col-10">medical</div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @for ($i = 0; $i < 6; $i++)
                                    <div class="col-6 col-md-4 mb-4 text-center">
                                        <img src="https://picsum.photos/300" alt="immagine segnaposto"
                                            class="img-fluid rounded shadow w-100 object-fit-cover"
                                            style="height: 250px;">
                                    </div>
                                @endfor
                            @endif

                        </div>
                    </div>

                    <div class="col-12 col-md-4 d-flex flex-column justify-content-between"
                        style="background-color: #3d2514; border-radius: 12px; padding: 30px; border-left: 4px solid #d4a843; box-shadow: 0px 10px 30px rgba(0,0,0,0.4); border-top: 1px solid rgba(212, 168, 67, 0.15); border-right: 1px solid rgba(212, 168, 67, 0.15); border-bottom: 1px solid rgba(212, 168, 67, 0.15);">

                        <div>
                            <h1
                                style="color: #fff; font-family: 'Poppins', sans-serif; font-size: 28px; font-weight: 600;">
                                {{ $article_to_check->title }}
                            </h1>

                            <h3 class="mt-2"
                                style="color: #d4a843; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">
                                {{ __('ui.author') }}: {{ $article_to_check->user?->name ?? __('ui.anonymous') }}
                            </h3>

                            <div class="my-3">
                                <span class="fw-bold px-3 py-1"
                                    style="color: #d4a843; background-color: #1a1a1a; border-radius: 4px; border: 1px solid rgba(212, 168, 67, 0.2); font-size: 18px; display: inline-block;">
                                    {{ $article_to_check->price }} €
                                </span>
                            </div>

                            <h4 class="fst-italic mb-3" style="color: #b58421; font-size: 15px;">
                                #{{ $article_to_check->category->name }}
                            </h4>

                            <p style="color: #fff3c4; font-size: 14px; line-height: 1.8; text-align: justify;">
                                {{ $article_to_check->description }}
                            </p>
                        </div>

                        <div class="d-flex justify-content-between gap-2 mt-4">
                            <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST"
                                class="w-50" onsubmit="return confirm('Vuoi rifiutare davvero l\'articolo?');">
                                @csrf
                                @method('PATCH')
                                <button class="btn py-2.5 w-100 fw-bold rounded-pill"
                                    style="background-color: #ff5c5c; color: #1a1a1a; font-size: 14px; text-transform: uppercase; letter-spacing: 1px; border: none;">
                                    {{ __('ui.reject') }}
                                </button>
                            </form>

                            <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST"
                                class="w-50">
                                @csrf
                                @method('PATCH')
                                <button class="btn py-2.5 w-100 fw-bold rounded-pill"
                                    style="background-color: #d4a843; color: #1a1a1a; font-size: 14px; text-transform: uppercase; letter-spacing: 1px; border: none;">
                                    {{ __('ui.accept') }}
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @else
            <div class="container" style="padding-top: 100px; text-align: center;">
                <span class="section-label">{{ __('ui.allGood') }}</span>

                <h1 class="fst-italic" style="color: #fff; font-size: 38px; margin: 20px 0;">
                    {{ __('ui.noArticlesToReview') }}
                </h1>

                <div class="main-border-button d-inline-block mt-3">
                    <a href="{{ route('homepage') }}" class="btn px-5 py-2.5 rounded-pill"
                        style="color: #d4a843; border: 1px solid #d4a843; text-decoration: none; text-transform: uppercase; font-size: 13px; font-weight: 600; background-color: transparent; transition: all 0.3s;">
                        {{ __('ui.goHome') }}
                    </a>
                </div>
            </div>
        @endif

        <div class="container text-center mt-5">
            <form action="{{ route('revisor.undo') }}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn py-2.5 px-5 fw-bold rounded-pill"
                    style="background-color: #3d2514; color: #fff3c4; border: 1px solid rgba(212, 168, 67, 0.3); font-size: 13px; text-transform: uppercase; letter-spacing: 1px; transition: all 0.3s;">
                    {{ __('ui.undoLastAction') }}
                </button>
            </form>
        </div>

    </div>
</x-layout>
