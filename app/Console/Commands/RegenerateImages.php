<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Image;
use App\Jobs\ResizeImage;
use Illuminate\Support\Facades\Storage;

class RegenerateImages extends Command
{
    protected $signature = 'images:regenerate';
    protected $description = 'Rigenera da zero il crop e il watermark su tutte le immagini esistenti';

    public function handle()
    {
        $images = Image::all();
        $this->info("Analisi di " . $images->count() . " immagini in corso...");

        foreach ($images as $image) {
            $path = $image->path; // Es. "articles/1/immagine.jpg"
            
            $dirname = dirname($path);
            $filename = basename($path);
            
            // Puliamo il percorso della cartella
            $cleanPath = $dirname === '.' ? '' : $dirname . '/';
            
            // Nome del vecchio crop da eliminare per fare spazio al nuovo
            $oldCropPath = $cleanPath . "crop_800x600_" . $filename;

            // Se esiste un vecchio crop, lo eliminiamo per evitare conflitti
            if (Storage::disk('public')->exists($oldCropPath)) {
                Storage::disk('public')->delete($oldCropPath);
            }

            // Lanciamo il Job che applicherà il nuovo crop v3 e il watermark
            ResizeImage::dispatch($path, 800, 600);
            
            $this->line("In coda per rigenerazione: {$filename} (ID: {$image->id})");
        }

        $this->info("Tutti i vecchi file sono stati inseriti in coda. Assicurati che 'queue:work' sia avviato!");
    }
}