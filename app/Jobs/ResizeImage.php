<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spatie\Image\Enums\ImageDriver;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Image;

class ResizeImage implements ShouldQueue
{
    use Queueable;

    private $w, $h, $fileName, $path;

    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }

    public function handle(): void
    {
        // Puliamo i percorsi per evitare doppie barre o cartelle 'public/' duplicate
        $cleanPath = $this->path === '.' ? '' : $this->path . '/';

        // Percorso assoluto dell'immagine sorgente
        $srcPath = storage_path('app/public/' . $cleanPath . $this->fileName);

        // Percorso assoluto di destinazione con il prefisso crop_
        $destPath = storage_path('app/public/' . $cleanPath . "crop_{$this->w}x{$this->h}_" . $this->fileName);

        // Percorso assoluto del watermark
        $watermarkPath = base_path('resources/img/watermark.png');

        // Controllo di sicurezza: se il file originale non esiste, fermiamo il job prima di rompere Spatie
        if (!file_exists($srcPath)) {
            return; 
        }

        // Se il watermark non esiste, facciamo solo il crop per evitare crash
        if (!file_exists($watermarkPath)) {
            /** @var \Spatie\Image\Image $image */
            $image = Image::useImageDriver(ImageDriver::Gd)->load($srcPath);
            
            $image->crop($this->w, $this->h, CropPosition::Center)
                  ->save($destPath);
            return;
        }

        // Esecuzione completa con crop e watermark (con aiuto per l'Intelephense dell'editor)
        /** @var \Spatie\Image\Image $image */
        $image = Image::useImageDriver(ImageDriver::Gd)->load($srcPath);

        $image->crop($this->w, $this->h, CropPosition::Center)
            ->watermark(
                $watermarkPath,
                paddingX: 20,
                paddingY: 20,
                width: 110,
                height: 110
            )
            ->save($destPath);
    }
}