<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence(20), 
            'slug' => Str::slug($this->faker->sentence(3)), 
            'contenus' => $this->faker->paragraphs(5, true), 
            'user_id' => User::inRandomOrder()->first()?->id , 
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'), 
            'updated_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'views_count' => $this->faker->numberBetween(0, 10000), 
            'etat' => $this->faker->numberBetween(0, 1), 
            'categorie_id' => Categorie::inRandomOrder()->first()?->id , 
        ];
    }
}
