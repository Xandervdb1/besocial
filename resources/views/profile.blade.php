@extends('layout')

@section('title', "Besocial - $user->name")
@section('header', $user->name)

@section('content')
    <h2>Projects by this user:</h2>
    <ul>
        @foreach ($user->posts as $post)
            <x-project-card :post="$post"/>
        @endforeach
    </ul>
@endsection