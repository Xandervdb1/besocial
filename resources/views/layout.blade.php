<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>
<body class="mx-2 bg-dark text-white">
    @section('nav')
        <nav>
            <a href="/">Home</a>
            <a href="/posts">All posts</a>
            <a href="/create-post"><button>Post new project</button></a>
        </nav>
    @show
    
    <h1>@yield('header')</h1>

    @yield('content')
</body>
</html>