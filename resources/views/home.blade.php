<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
</head>
<body>
    <h1>Homepage</h1>
    @foreach ($posts as $post)
    <div>
            <h2><a href="/{{$post->slug}}">{{$post->title}}</a></h2>
            <p>{{$post->user->name}}</p>
            <p>{{$post->short_desc}}</p>
        </div>
    @endforeach
</body>
</html>