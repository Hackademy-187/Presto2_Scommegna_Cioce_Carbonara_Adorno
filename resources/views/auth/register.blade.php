<x-layout>
    <div style="background: linear-gradient(135deg, #1c483c 0%, #1a3028 100%); min-height: 100vh; padding-bottom: 60px;">
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-12 text-center" style="padding-top: 60px; padding-bottom: 40px;">
                    <span class="section-label">Nuovo Account</span>
                    <h1 class="display-4 fw-bold mt-2" style="color: #fff; font-family: 'Poppins', sans-serif;">
                        Registrati
                    </h1>
                    <div class="mx-auto mt-3" style="width: 60px; height: 3px; background-color: #d4a843;"></div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center height-custom">
                <div class="col-12 col-md-6">
                    <form method="POST" action="{{ route('register') }}" style="background-color: #0d1f1a; border: 1px solid #1a3028; border-radius: 12px; padding: 40px; box-shadow: 0 4px 30px rgba(0,0,0,0.3);">
                        @csrf
                        
                        {{-- Campo Nome --}}
                        <div class="mb-4">
                            <label for="name" class="form-label" style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #d4a843;">Nome:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                style="border: 1px solid #1a3028; border-radius: 6px; padding: 12px 15px; font-size: 14px; background-color: #1a3028; color: #fff;">
                            @error('name')
                                <span class="text-danger d-block mt-2" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Campo Email --}}
                        <div class="mb-4">
                            <label for="registerEmail" class="form-label" style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #d4a843;">Indirizzo email</label>
                            <input type="email" class="form-control" id="registerEmail" name="email" value="{{ old('email') }}"
                                style="border: 1px solid #1a3028; border-radius: 6px; padding: 12px 15px; font-size: 14px; background-color: #1a3028; color: #fff;">
                            @error('email')
                                <span class="text-danger d-block mt-2" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Campo Password --}}
                        <div class="mb-4">
                            <label for="password" class="form-label" style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #d4a843;">Password:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                style="border: 1px solid #1a3028; border-radius: 6px; padding: 12px 15px; font-size: 14px; background-color: #1a3028; color: #fff;">
                            @error('password')
                                <span class="text-danger d-block mt-2" style="font-size: 13px;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Campo Conferma Password --}}
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label" style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #d4a843;">Conferma la password:</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                style="border: 1px solid #1a3028; border-radius: 6px; padding: 12px 15px; font-size: 14px; background-color: #1a3028; color: #fff;">
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn-presto" style="padding: 14px 50px; font-size: 14px; letter-spacing: 2px; text-transform: uppercase; background-color: #d4a843;">
                                Registrati
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>