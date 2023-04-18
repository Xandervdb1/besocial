<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All posts page</title>
</head>
<body>    
    <nav>
        <a href="/">Home</a>
        <a href="/posts">All posts</a>
        <a href="/create-post"><button>Post new project</button></a>
    </nav>
    <h1>All posts</h1>
    <ul>
        @foreach ($posts as $post)
            <li>
                <h2><a href="/post/{{$post->slug}}">{{$post->title}}</a></h2>
                <p><a href="/profile/{{$post->user->slug}}">{{$post->user->name}}</a></p>
                <p>{{$post->short_desc}}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>