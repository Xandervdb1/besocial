<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create page</title>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/posts">All posts</a>
        <a href="/create-post"><button>Post new project</button></a>
    </nav>
    <h1>Post a new project</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Project Title</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="link">Project Link</label>
            <input type="text" name="link" id="link">
        </div>
        <div>
            <label for="short_desc">Short description</label>
            <input type="text" name="short_desc" id="short_desc">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="2"></textarea>
        </div>
        <div>
            <label for="thumbnail">Thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail">
        </div>
        <button type="submit">Post your project!</button>
    </form>
</body>
</html>