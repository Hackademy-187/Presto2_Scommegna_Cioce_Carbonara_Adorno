<x-layout>
    <div class="auth-page">

        <div class="auth-card">

            <div class="text-center mb-4">
                <span class="section-label">Bentornato</span>
                <h1 class="auth-title">Accedi</h1>
                <div class="mx-auto mt-3" style="width:60px;height:3px;background:#d4a843;"></div>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

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

                <button type="submit" class="auth-button">Accedi</button>

                <div class="auth-link">
                    Non hai un account?
                    <a href="{{ route('register') }}">Registrati</a>
                </div>

            </form>

        </div>
    </div>
</x-layout>