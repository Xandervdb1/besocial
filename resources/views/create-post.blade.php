@extends('layout')

@section('title', 'BeSocial')
@section('header', 'Post a new project')
@section('headerclass', 'hidden')

@section('content')
    <h1>
        @if ($edit)
            Edit your project
        @else
            Post a new project
        @endif
    </h1>
    @if ($errors->any())
        <div class="errors">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action={{$edit ? '/edit-post/' . $post->slug  : '/create-post' }} method="POST" enctype="multipart/form-data" class="createform">
        @csrf
        <div>
            <label for="title">Project Title</label>
            <input type="text" name="title" id="title" value="{{$edit ? $post->title : old('title')}}">
        </div>
        <div class="tagselects">
            <label id="tag">Tags</label>
            <select name="tag1" id="tag1" aria-labelledby="date">
                <option value="">Pick a tag</option>
                @foreach ($tags as $tag)
                    <option value="{{$tag->slug}}" {{$edit && $post->tags[0]->slug === $tag->slug ? 'selected' : ''}} {{ old('tag1') === $tag->slug ? 'selected' : '' }}>{{$tag->tag}}</option>
                @endforeach
            </select>
            <select name="tag2" id="tag2" aria-labelledby="date">
                <option value="">Pick a tag</option>
                @foreach ($tags as $tag)
                    <option value="{{$tag->slug}}" {{$edit && $post->tags[1]->slug === $tag->slug ? 'selected' : ''}} {{ old('tag2') === $tag->slug ? 'selected' : '' }}>{{$tag->tag}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="short_desc">Short description</label>
            <input type="text" name="short_desc" id="short_desc" value="{{$edit ? $post->short_desc : old('short_desc')}}">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="2">{{$edit ? $post->description : old('description')}}</textarea>
        </div>
        <div>
            <label for="link">Project Link</label>
            <input type="text" name="link" id="link" value="{{$edit ? $post->link : old('link')}}">
        </div>
        @if (!$edit)
            <div>
                <label for="thumbnail">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
        @endif
        <div><button type="submit">{{$edit ? 'Edit' : 'Post'}} your project!</button></div>
    </form>
@endsection