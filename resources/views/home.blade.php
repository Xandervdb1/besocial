@extends('layout')

@section('title', 'BeSocial')
@section('header', 'BeSocial')
@section('headerclass', 'hidden')

@section('content')
<div class="hero">
    <h1 class="indexheader">BeSocial</h1>
    <div class="filters">
        <form action="" class="searchform">
            <label for="search">Look for a project</label>
            <input type="text" name="search" id="search">
        </form>
        <div class="tags">
            @foreach ($tags as $tag)
                <a href="/posts/{{$tag->slug}}">{{$tag->tag}}</a>
            @endforeach
        </div>
    </div>
    <div></div>
</div>
<h2>Latest projects</h2>
<div class="cardcontainer">
    @foreach ($posts as $post)
        <x-project-card :post="$post"/>
    @endforeach
</div> 
@endsection