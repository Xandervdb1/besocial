<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tags = ["frontend", "backend", "design", "API", "HTML/CSS", "Javascript", "PHP", "Java"];
        \App\Models\User::factory(10)->create();
        \App\Models\Post::factory(10)->create();
        foreach ($tags as $tag) {
            \App\Models\Tag::factory()->create([
                'tag' => $tag,
            ]);
        }
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
