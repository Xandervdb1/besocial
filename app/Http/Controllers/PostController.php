<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
        $posts = $tag->posts->sortByDesc('created_at');
        return view('posts')->with(['posts'=> $posts, 'filteredByTag' => true, 'tag' => $tag]);
    }

    public function filterOnSearch (Request $request)
    {
        $posts = Post::where('title', 'LIKE', '%' . $request->search . '%')->orderBy('created_at', 'desc')->get();
        return view('posts')->with(['posts'=> $posts, 'filteredBySearch' => true, 'request' => $request]);
    }

    public function showForm ()
    {
        $tags = Tag::all();
        return view('create-post')->with(['tags' => $tags, 'edit' => false]);
    }

    public function submitForm (Request $request)
    {
        $validated = $request->validate([
            'title' => 'unique:posts|required|min:3|max:100',
            'tag1' => 'required|different:tag2',
            'tag2' => 'required',
            'short_desc' => 'unique:posts|required|min:20|max:255',
            'description' => 'unique:posts|required|min:20|max:255',
            'link' => 'unique:posts|required|active_url',
            'thumbnail' => 'required|image',
        ]);

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
        $post->user_id = Auth::user()->id;

        $post->save();
        $post->tags()->attach(Tag::where("tag", "=", $request->tag1)->get());
        $post->tags()->attach(Tag::where("tag", "=", $request->tag2)->get());
        //storing the image to storage/public/thumbnails/project-name/filename
        $path = 'public/thumbnails/' . Str::slug($request->title) . '/' . Str::slug($filename) . '.' . $extension;  
        Storage::put($path, file_get_contents($request->thumbnail));

        $user = Auth::user();
        return redirect("/profile/$user->slug");
    }

    function showEditForm (Post $post) {
        $tags = Tag::all();
        return view('create-post')->with(['post' => $post, 'tags' => $tags, 'edit' => true]);
    }

    function editPost (Post $post, Request $request) {
        $validated = $request->validate([
            'title' => "unique:posts,title,$post->id|required|min:3|max:100",
            'tag1' => 'required|different:tag2',
            'tag2' => 'required',
            'short_desc' => "unique:posts,short_desc,$post->id|required|min:20|max:255",
            'description' => "unique:posts,description,$post->id|required|min:20|max:255",
            'link' => "unique:posts,link,$post->id|required|active_url",
            'thumbnail' => 'image',
        ]);

        $post->title = $request->title;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->link = $request->link;
        $post->short_desc = $request->short_desc;
        $post->description = $request->description;
        $post->update();

        $user = Auth::user();
        return redirect("/profile/$user->slug");
    }
    
    function deletePost (Post $post) {
        $post->tags()->detach();
        $path = "public/thumbnails/$post->slug";
        Storage::deleteDirectory($path);
        $post->delete();
        $user = Auth::user();
        return redirect("/profile/$user->slug");
    }
}
