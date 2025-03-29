<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    // S'assurer qu'il y a au moins un utilisateur et une catégorie
    $users = User::all();
    if ($users->isEmpty()) {
        $users = User::factory(5)->create();
    }
    
    $categories = Categorie::all();
    if ($categories->isEmpty()) {
        $categories = Categorie::factory(3)->create();
    }
    
    // Créer des posts en assignant explicitement les relations
    Post::factory(120)->make()->each(function ($post) use ($users, $categories) {
        $post->user_id = $users->random()->id;
        $post->categorie_id = $categories->random()->id;
        $post->save();
    });
    }
}
