<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

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
    public function definition()
    {
        $title = fake()->words(3, true);
        $slug = Str::slug($title);
        return [
            'title' => $title,
            'slug' => $slug,
            'link' => 'www.google.com',
            'short_desc' => fake()->sentence(),
            'description' => fake()->text(),
            'thumbnailsrc' => 'storage/thumbnails/default.png',
            'user_id' => User::all()->random()->id,
        ]; 
    }
}
