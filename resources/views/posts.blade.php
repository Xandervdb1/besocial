@extends('layout')

@section('title', 'BeSocial')
@section('header', 'All Posts')

@section('content')
<ul class="cardcontainer">
    @foreach ($posts as $post)
        <x-project-card :post="$post"/>
    @endforeach
</ul>
@endsection