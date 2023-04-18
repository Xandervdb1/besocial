@extends('layout')

@section('title', 'BeSocial')
@section('header', $post->title)

@section('content')
    <p>By: {{$post->user->name}}</p>
    <p>{{$post->description}}</p>
    @foreach ($post->tags as $tag)
        <p style='background-color: {{$tag->color}}'>{{$tag->tag}}</p>
    @endforeach
@endsection