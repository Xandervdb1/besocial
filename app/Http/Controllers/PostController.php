<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function showHome ()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $tags = Tag::all();
        return view('home')->with(['posts'=> $posts, 'tags' => $tags]);
    }

    public function showAll ()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts')->with('posts', $posts);
    }

    public function showDetail (Post $post)
    {
        return view('detail-post')->with('post', $post);
    }

    public function filterOnTag (Tag $tag) 
    {
        return view('filtered-posts')->with('tag', $tag);
    }

    public function showForm ()
    {
        return view('create-post');
    }

    public function submitForm (Request $request)
    {
        $post = New Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->link = $request->link;
        $post->short_desc = $request->short_desc;
        $post->description = $request->description;
        
        $originalThumbnailName = $request->thumbnail->getClientOriginalName();
        $filename = pathinfo($originalThumbnailName, PATHINFO_FILENAME);
        $extension = pathinfo($originalThumbnailName, PATHINFO_EXTENSION);
        
        $post->thumbnailsrc = 'storage/thumbnails/' . $post->slug . '/' . Str::slug($filename) . '.' . $extension;
        $post->user_id = 1;

        $post->save();
        //storing the image to storage/public/thumbnails/project-name/filename
        $path = 'public/thumbnails/' . Str::slug($request->title) . '/' . Str::slug($filename) . '.' . $extension;  
        Storage::put($path, file_get_contents($request->thumbnail));

        return redirect()->route('index');
    }
}
