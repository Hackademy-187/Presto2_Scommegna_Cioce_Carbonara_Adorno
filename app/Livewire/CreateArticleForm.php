<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateArticleForm extends Component
{
    use WithFileUploads;

    public $images = [];
    public $temporary_images;

    #[Validate('required|min:5')]
    public $title;

    #[Validate('required|min:10')]
    public $description;

    #[Validate('required|numeric')]
    public $price;

    #[Validate('required')]
    public $category;

    public $article;

    public function render()
    {
        return view('livewire.create-article-form');
    }

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
            'temporary_images'   => 'max:6'
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
            $this->images = array_values($this->images);
        }
    }

    public function store()
    {
        $this->validate();

        $this->article = Article::create([
            'title'       => $this->title,
            'description' => $this->description,
            'price'       => $this->price,
            'category_id' => $this->category,
            'user_id'     => Auth::id(),
        ]);

        // 1. Prepariamo le anteprime prima di svuotare o salvare definitivamente
        $savedPreviews = [];
        foreach ($this->images as $image) {
            // Generiamo l'URL temporaneo di Livewire per il frontend
            $savedPreviews[] = $image->temporaryUrl();
        }

        // Salva le immagini nel database/storage e avvia il Job di resize
        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $newFileName = "articles/{$this->article->id}";

        $newImage = $this->article->images()->create([
            'path' => $image->store($newFileName, 'public')
        ]);

        // dispatch(new ResizeImage($newImage->path, 800, 600));
        // dispatch(new GoogleVisionSafeSearch($newImage->id));
        //         dispatch(new GoogleVisionLabelImage($newImage->id));

    RemoveFaces::withChain([
        new ResizeImage($newImage->path, 800, 600),
        new GoogleVisionSafeSearch($newImage->id),
        new GoogleVisionLabelImage($newImage->id),
    ])->dispatch($newImage->id);

    }

    File::deleteDirectory(storage_path('/app/livewire-tmp'));
}

        session()->flash('success', 'Articolo creato correttamente, in attesa di approvazione da parte del revisore');
        
        // 2. Puliamo il modulo (campi di testo e immagini)
        $this->cleanForm();

        // 3. Spariamo l'evento al browser passando gli URL delle foto salvate
        $this->dispatch('article-created', ['previews' => $savedPreviews]);
    }

    protected function cleanForm()
    {
        $this->title = '';
        $this->description = '';
        $this->category = '';
        $this->price = '';
        // Svuotiamo anche le proprietà delle immagini così il form torna vergine
        $this->images = [];
        $this->temporary_images = null;
    }
}