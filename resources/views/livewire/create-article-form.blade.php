<div>
    <!-- Stile personalizzato al volo per gestire gli errori di Bootstrap sui campi scuri -->
    <style>
        .form-control.is-invalid {
            background-color: #1a3028 !important;
            color: #fff !important;
            border-color: #e74c3c !important;
        }
    </style>

    @if (session()->has('success'))
        <div class="text-center py-3 mb-4" style="background-color: #d4a843; color: #fff; font-weight: 600; border-radius: 4px; letter-spacing: 1px;">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit="save" style="background-color: #0d1f1a; border-radius: 12px; padding: 40px; box-shadow: 0 4px 30px rgba(0,0,0,0.3); margin: 40px 0; border: 1px solid #1a3028;">
        <div class="mb-4">
            <label for="title" class="form-label" style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #d4a843;">Titolo:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" wire:model.blur="title"
                style="border: 1px solid #1a3028; border-radius: 6px; padding: 12px 15px; font-size: 14px; background-color: #1a3028; color: #fff;">
            @error('title')
                <p class="fst-italic" style="color: #e74c3c; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="form-label" style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #d4a843;">Descrizione:</label>
            <textarea id="description" cols="30" rows="10"
                class="form-control @error('description') is-invalid @enderror" wire:model.blur="description"
                style="border: 1px solid #1a3028; border-radius: 6px; padding: 12px 15px; font-size: 14px; background-color: #1a3028; color: #fff;"></textarea>
            @error('description')
                <p class="fst-italic" style="color: #e74c3c; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="form-label" style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #d4a843;">Prezzo (€):</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" wire:model.blur="price"
                style="border: 1px solid #1a3028; border-radius: 6px; padding: 12px 15px; font-size: 14px; background-color: #1a3028; color: #fff;">
            @error('price')
                <p class="fst-italic" style="color: #e74c3c; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category" class="form-label" style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #d4a843;">Categoria:</label>
            <select id="category" wire:model.blur="category" class="form-control @error('category') is-invalid @enderror"
                style="border: 1px solid #1a3028; border-radius: 6px; padding: 12px 15px; font-size: 14px; background-color: #1a3028; color: #fff;">
                <option value="" disabled selected> Seleziona una categoria </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <p class="fst-italic" style="color: #e74c3c; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn-presto" style="padding: 14px 50px; font-size: 14px; letter-spacing: 2px; text-transform: uppercase; background-color: #d4a843; border: none; color: #fff; font-weight: 600; border-radius: 6px;">
                Pubblica
            </button>
        </div>
    </form>

    <!-- Script Livewire v3 per catturare l'evento e fare lo scroll fluido in cima -->
    @script
    <script>
        $wire.on('article-created', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
    @endscript
</div>