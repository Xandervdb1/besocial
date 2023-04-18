@extends('layout')

@section('title', 'BeSocial')
@section('header', 'Post a new project')

@section('content')
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
@endsection