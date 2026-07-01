<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use Spatie\Image\Enums\ImageDriver;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Enums\Unit;
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
    $w = $this->w;
    $h = $this->h;

    // Ricomponiamo i percorsi relativi interni alla cartella storage/app/public
    $relativeSrc = $this->path . '/' . $this->fileName;
    $relativeDest = $this->path . "/crop_{$w}x{$h}_" . $this->fileName;

    // Otteniamo i percorsi assoluti reali del sistema operativo
    $srcPath = Storage::disk('public')->path($relativeSrc);
    $destPath = Storage::disk('public')->path($relativeDest);

    // Eseguiamo il crop con Spatie
    Image::useImageDriver(ImageDriver::Gd)->load($srcPath)
        ->crop($w, $h, CropPosition::Center)
        ->watermark(
            base_path('resources/img/watermark.png'),
            paddingX: 5,
            paddingY: 5,
            width: 50,
            height: 50,
            paddingUnit: Unit::Percent
        )
        ->save($destPath);
}
}