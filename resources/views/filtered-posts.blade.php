@extends('layout')

@section('title', 'BeSocial')
@section('header', 'All Posts tagged with ' . $tag->tag)

@section('content')
<ul class="cardcontainer">
    @foreach ($tag->posts as $post)
        <x-project-card :post="$post"/>
    @endforeach
</ul>
@endsection