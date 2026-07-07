<footer class="bg-white text-dark py-4 border-top">
    <div class="container">
        <div class="row g-3 text-center text-md-start">
            
            <div class="col-sm-4 col-md-3">
                <h6 class="fw-bold text-warning mb-2" style="color: #ffc107 !important;">Presto.it</h6>
                <ul class="list-unstyled small mb-0">
                    <li><a href="{{ route('homepage') }}" class="text-secondary text-decoration-none">{{ __('ui.home') }}</a></li>
                    <li><a href="{{ route('article.index') }}" class="text-secondary text-decoration-none">{{ __('ui.articles') }}</a></li>
                </ul>
            </div>
            
            <div class="col-sm-4 col-md-3">
                <h6 class="fw-bold mb-2" style="color: #d97706;">{{ __('ui.categories') }}</h6>
                <ul class="list-unstyled small mb-0">
                    @foreach ($categories->take(4) as $category)
                        <li>
                            <a href="{{ route('byCategory', ['category' => $category]) }}" class="text-secondary text-decoration-none">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            <div class="col-sm-4 col-md-3">
                <h6 class="fw-bold text-dark mb-2">{{ __('ui.account') }}</h6>
                <ul class="list-unstyled small mb-0">
                    @auth
                        <li><a href="{{ route('create.article') }}" class="text-secondary text-decoration-none">{{ __('ui.publish') }}</a></li>
                        <li>
                            <a href="#" class="text-danger text-decoration-none" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">
                                {{ __('ui.logout') }}
                            </a>
                        </li>
                        <form id="form-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <li><a href="{{ route('login') }}" class="text-secondary text-decoration-none">{{ __('ui.login') }}</a></li>
                        <li><a href="{{ route('register') }}" class="text-secondary text-decoration-none">{{ __('ui.register') }}</a></li>
                    @endauth
                </ul>
            </div>

            <div class="col-md-3 text-center bg-light p-2 rounded border border-warning-subtle">
                <h6 class="fw-bold mb-1 small">{{ __('ui.becomeRevisor') }}</h6>
                <p class="text-muted xsmall mb-2" style="font-size: 0.75rem;">{{ __('ui.becomeRevisorText') }}</p>
                <a href="{{ route('become.revisor') }}" class="btn btn-sm text-white w-100 fw-bold" style="background-color: #e6a100;">{{ __('ui.becomeRevisorBtn') }}</a>
            </div>
        </div>

        <hr class="my-3 opacity-25">

        <div class="row align-items-center xsmall" style="font-size: 0.85rem;">
            <div class="col-md-6 text-center text-md-start text-muted">
                <p class="mb-0" style="color:#8c6239 ;">© {{ date('Y') }} Subirra.it — {{ __('ui.allRights') }}</p>
            </div>
            <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mx-2"><a href="#" style="color: #8c6239;"><i class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item mx-2"><a href="#" style="color: #8c6239;"><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item mx-2"><a href="#" style="color: #8c6239;"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>