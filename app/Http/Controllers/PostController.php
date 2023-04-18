<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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
}
