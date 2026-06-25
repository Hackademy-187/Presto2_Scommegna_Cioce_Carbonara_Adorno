<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\CategoriesSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $users = \App\Models\User::factory(5)->create();
        $categories = \App\Models\Category::factory(4)->create();
        \App\Models\Article::factory(30)->create([
        'user_id' => fn () => $users->random()->id,
        'category_id' => fn () => $categories->random()->id,
        $this->call(CategoriesSeeder::class)]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
