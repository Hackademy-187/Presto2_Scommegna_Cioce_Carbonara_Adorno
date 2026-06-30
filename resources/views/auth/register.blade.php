<x-layout>
    <div class="auth-page">

        <div class="auth-card">

            <div class="text-center mb-4">
                <span class="section-label">Nuovo Account</span>
                <h1 class="auth-title">Registrati</h1>
                <div class="mx-auto mt-3" style="width:60px;height:3px;background:#d4a843;"></div>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- NAME --}}
                <div class="mb-3">
                    <label class="auth-label">Nome</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="auth-input">

                    @error('name')
                        <div class="auth-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div class="mb-3">
                    <label class="auth-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="auth-input">

                    @error('email')
                        <div class="auth-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div class="mb-3">
                    <label class="auth-label">Password</label>
                    <input type="password" name="password" class="auth-input">

                    @error('password')
                        <div class="auth-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- CONFIRM PASSWORD --}}
                <div class="mb-3">
                    <label class="auth-label">Conferma Password</label>
                    <input type="password" name="password_confirmation" class="auth-input">
                </div>

                <button type="submit" class="auth-button">Registrati</button>

                <div class="auth-link">
                    Hai già un account?
                    <a href="{{ route('login') }}">Accedi</a>
                </div>

            </form>

        </div>
    </div>
</x-layout>