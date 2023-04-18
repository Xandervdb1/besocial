<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail page</title>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/posts">All posts</a>
        <a href="/create-post"><button>Post new project</button></a>
    </nav>
    <h1>{{$post->title}}</h1>
    <p>By: {{$post->user->name}}</p>
    <p>{{$post->description}}</p>
    @foreach ($post->tags as $tag)
        <p style='background-color: {{$tag->color}}'>{{$tag->tag}}</p>
    @endforeach
</body>
</html>