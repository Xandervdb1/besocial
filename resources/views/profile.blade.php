@extends('layout')

@section('title', "Besocial - $user->name")
@section('header', $user->name)
@section('headerclass', "profileheader")

@section('content')
    <div class="profilecontent">
        <h2>Projects by this user:</h2>
        <ul class="cardcontainer">
            @foreach ($user->posts as $post)
                <x-profile-card :post="$post"/>
            @endforeach
        </ul>
    </div>
@endsection