<div class="container py-5" style="min-height: 100vh;">

    @if (session()->has('success'))
        <div id="success-toast" class="text-center" style="
            position: fixed;
            top: 30px;
            left: 50%;
            transform: translateX(-50%) translateY(-20px);
            z-index: 9999;
            background-color: #fff3c4;
            color: #2b1a0e;
            font-weight: 700;
            border-radius: 8px;
            letter-spacing: 0.5px;
            padding: 16px 30px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.35);
            opacity: 0;
            transition: opacity 0.4s ease, transform 0.4s ease;
            max-width: 90%;
        ">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit="store" onsubmit="window.scrollTo({top: 0, behavior: 'smooth'});" style="background-color: #3d2514; border-radius: 12px; padding: 40px; box-shadow: 0 10px 40px rgba(0,0,0,0.4); margin: 40px auto; max-width: 700px; border: 1px solid rgba(212, 168, 67, 0.15);">
        
        <div class="mb-4">
            <label for="title" class="form-label" style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #d4a843;">{{ __('ui.title') }}:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" wire:model.blur="title"
                style="border: 1px solid #5a3511; border-radius: 6px; padding: 12px 15px; font-size: 14px; background-color: #2b1a0e; color: #fff3c4;">
            @error('title')
                <p class="fst-italic" style="color: #ff5c5c; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="form-label" style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #d4a843;">{{ __('ui.description') }}:</label>
            <textarea id="description" cols="30" rows="10"
                class="form-control @error('description') is-invalid @enderror" wire:model.blur="description"
                style="border: 1px solid #5a3511; border-radius: 6px; padding: 12px 15px; font-size: 14px; background-color: #2b1a0e; color: #fff3c4;"></textarea>
            @error('description')
                <p class="fst-italic" style="color: #ff5c5c; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="form-label" style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #d4a843;">{{ __('ui.price') }} (€):</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" wire:model.blur="price"
                style="border: 1px solid #5a3511; border-radius: 6px; padding: 12px 15px; font-size: 14px; background-color: #2b1a0e; color: #fff3c4;">
            @error('price')
                <p class="fst-italic" style="color: #ff5c5c; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category" class="form-label" style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #d4a843;">{{ __('ui.category') }}:</label>
            <select id="category" wire:model.blur="category" class="form-control @error('category') is-invalid @enderror"
                style="border: 1px solid #5a3511; border-radius: 6px; padding: 12px 15px; font-size: 14px; background-color: #2b1a0e; color: #fff3c4;">
                <option value="" disabled selected style="color: #888;">{{ __('ui.selectCategory') }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" style="background-color: #2b1a0e; color: #fff3c4;">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <p class="fst-italic" style="color: #ff5c5c; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label" style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #d4a843;">Immagini:</label>
            <!-- AGGIUNTO ID="imageInput" PER IL RESET JAVASCRIPT -->
            <input type="file" id="imageInput" wire:model.live="temporary_images" multiple
                class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img/"
                style="border: 1px solid #5a3511; border-radius: 6px; padding: 12px 15px; font-size: 14px; background-color: #2b1a0e; color: #fff3c4;"/>
            @error('temporary_images.*')
                <p class="fst-italic" style="color: #ff5c5c; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
            @enderror
            @error('temporary_images')
                <p class="fst-italic" style="color: #ff5c5c; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        @if (!empty($images))
            <div class="mb-4">
                <p style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #d4a843;">Anteprima Foto:</p>
                <div class="row border border-2 rounded shadow py-3 g-2" style="border-color: #5a3511 !important; background-color: #2b1a0e;">
                    @foreach ($images as $key => $image)
                        <div class="col-4 d-flex flex-column align-items-center my-2">
                            <div class="img-preview mx-auto shadow rounded"
                                style="background-image: url({{ $image->temporaryUrl() }}); width: 100px; height: 100px; background-size: cover; background-position: center;">
                            </div>
                            <button type="button" class="btn btn-sm mt-2 btn-danger" 
                                wire:click="removeImage({{ $key }})">X</button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn-presto" style="padding: 14px 50px; font-size: 14px; letter-spacing: 2px; text-transform: uppercase; background-color: #fff3c4; border: none; color: #1a1a1a; font-weight: 700; border-radius: 6px; transition: all 0.3s ease;">
                {{ __('ui.publishArticle') }}
            </button>
        </div>
    </form>

   @script
    <script>
        const toast = document.getElementById('success-toast');
        if (toast) {
            showToast(toast);
        }

        function showToast(el) {
            requestAnimationFrame(() => {
                el.style.opacity = '1';
                el.style.transform = 'translateX(-50%) translateY(0)';
            });

            setTimeout(() => {
                el.style.opacity = '0';
                el.style.transform = 'translateX(-50%) translateY(-20px)';
                setTimeout(() => el.remove(), 400);
            }, 3500);
        }

        $wire.on('article-created', () => {
            // 1. Riporta su la pagina con lo scroll fluido
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

            // 2. Svuota fisicamente il campo di testo del selettore file HTML
            const fileInput = document.getElementById('imageInput');
            if (fileInput) {
                fileInput.value = '';
            }

            // 3. Anima il toast appena Livewire lo inserisce nel DOM
            setTimeout(() => {
                const newToast = document.getElementById('success-toast');
                if (newToast) {
                    showToast(newToast);
                }
            }, 50);
        });
    </script>
    @endscript
   

</div>