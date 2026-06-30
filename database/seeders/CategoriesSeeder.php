<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    public $categories = [
    'Pilsner & Lager',
    'IPA (India Pale Ale)',
    'Pale Ale & Amber Ale',
    'Stout & Porter',
    'Blanche & Witbier',
    'Weissbier (Weizen)',
    'Belgian Strong Ale',
    'Sour & Gose',
    'Bock & Strong Lager',
    'Analcoliche & Low Alcohol',
];

    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}