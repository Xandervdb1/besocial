<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tags = ["Frontend", "Backend", "Design", "API", "HTML/CSS", "Javascript", "PHP", "Java"];
        $colors = ["#FA9189", "#FCAE7C", "#FFE699", "#F9FFB5", "#B3F5BC", "#D6F6FF", "#E2CBF7", "#D1BDFF"];
        \App\Models\User::factory(4)->create();
        \App\Models\Post::factory(20)->create();
        foreach ($tags as $key => $tag) {
            \App\Models\Tag::factory()->create([
                'tag' => $tag,
                'slug' => Str::slug($tag),
                'color' => $colors[$key],
            ]);
        }
        $posts = Post::all();
        foreach ($posts as $post) {
            $post->tags()->attach(Tag::all()->random()->id);
            $post->tags()->attach(Tag::all()->random()->id);
        }
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
