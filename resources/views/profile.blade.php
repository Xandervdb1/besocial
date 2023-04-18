<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile page</title>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/posts">All posts</a>
        <a href="/create-post"><button>Post new project</button></a>
    </nav>
    <h1>{{$user->name}}</h1>
    @foreach ($user->posts as $post)
        <h2>{{$post->title}}</h2>
    @endforeach
</body>
</html>