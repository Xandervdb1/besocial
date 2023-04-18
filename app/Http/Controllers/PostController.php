<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function showHome ()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        return view('home')->with('posts', $posts);
    }

    public function showAll ()
    {
        $posts = Post::all();
        return view('posts')->with('posts', $posts);
    }

    public function showDetail (Post $post)
    {
        return view('detail-post')->with('post', $post);
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
        $post->thumbnailsrc = 'storage/thumbnails/' . $post->slug . '/' . $originalThumbnailName;
        $post->user_id = 1;

        $post->save();
        //storing the image to storage/public/thumbnails/project-name/filename
        $path = 'public/thumbnails/' . Str::slug($request->title) . '/' . $originalThumbnailName;  
        Storage::put($path, file_get_contents($request->thumbnail));

        return redirect()->route('index');
    }
}
