<div>
    <div class="container py-5" style="min-height: 100vh;">

    @if (session()->has('success'))
        <div class="text-center py-3 mb-4" style="background-color: #d4a843; color: #1a1a1a; font-weight: 700; border-radius: 6px; letter-spacing: 1px; box-shadow: 0 4px 15px rgba(212, 168, 67, 0.2);">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit="save" style="background-color: #3d2514; border-radius: 12px; padding: 40px; box-shadow: 0 10px 40px rgba(0,0,0,0.4); margin: 40px auto; max-width: 700px; border: 1px solid rgba(212, 168, 67, 0.15);">
        
        <div class="mb-4">
            <label for="title" class="form-label" style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #d4a843;">Titolo:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" wire:model.blur="title"
                style="border: 1px solid #5a3511; border-radius: 6px; padding: 12px 15px; font-size: 14px; background-color: #2b1a0e; color: #fff3c4;">
            @error('title')
                <p class="fst-italic" style="color: #ff5c5c; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="form-label" style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #d4a843;">Descrizione:</label>
            <textarea id="description" cols="30" rows="10"
                class="form-control @error('description') is-invalid @enderror" wire:model.blur="description"
                style="border: 1px solid #5a3511; border-radius: 6px; padding: 12px 15px; font-size: 14px; background-color: #2b1a0e; color: #fff3c4;"></textarea>
            @error('description')
                <p class="fst-italic" style="color: #ff5c5c; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="form-label" style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #d4a843;">Prezzo (€):</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" wire:model.blur="price"
                style="border: 1px solid #5a3511; border-radius: 6px; padding: 12px 15px; font-size: 14px; background-color: #2b1a0e; color: #fff3c4;">
            @error('price')
                <p class="fst-italic" style="color: #ff5c5c; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category" class="form-label" style="font-weight: 600; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #d4a843;">Categoria:</label>
            <select id="category" wire:model.blur="category" class="form-control @error('category') is-invalid @enderror"
                style="border: 1px solid #5a3511; border-radius: 6px; padding: 12px 15px; font-size: 14px; background-color: #2b1a0e; color: #fff3c4;">
                <option value="" disabled selected style="color: #888;"> Seleziona una categoria </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" style="background-color: #2b1a0e; color: #fff3c4;">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <p class="fst-italic" style="color: #ff5c5c; font-size: 12px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn-presto" style="padding: 14px 50px; font-size: 14px; letter-spacing: 2px; text-transform: uppercase; background-color: #fff3c4; border: none; color: #1a1a1a; font-weight: 700; border-radius: 6px; transition: all 0.3s ease;">
                Pubblica Articolo
            </button>
        </div>
    </form>

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