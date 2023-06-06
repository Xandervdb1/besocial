@extends('layout')

@section('title', "Besocial - $user->name")
@section('header', $user->name)
@section('headerclass', "hidden")

@section('content')
    <div class="modalcontainer hidden">
        <section class="modal">
            <div class="flex">
                <h3>Whoa there!</h3>
                <button id="btn-close">⨉</button>
            </div>
            <div>
                <p>Are you sure you want to delete the project "<span class="projecttitle"></span>?</p>
            </div>
            <a class="deletelink" href=""><button>Delete</button></a>
        </section>
    </div>
    <div class="overlay hidden"></div>
    <div class="profileheader">
        <div class="profilepiccontainer">
            <img src="../{{$user->profilepicsrc}}" alt="Profile picture" class="profilepic">
        </div>
        <h1>{{$user->name}}</h1>
    </div>
    <div class="profilecontent">
        <h2 class="bio">Bio:</h2>
        <p class="bio">{{$user->bio}}</p>
        <h2>Projects by this user:</h2>
    </div>
        @if ($user->posts->isEmpty())
            <div class="noposts">
                <img src="../storage/noposts.png" alt="no posts" class="nopostimg">
                <p>Nothing to show yet.</p>
            </div>
        @endif
        <div class="cardcontainerpadding">
            <ul class="cardcontainer">
                @foreach ($user->posts->sortByDesc('created_at') as $post)
                    <x-profile-card :post="$post"/>
                @endforeach
            </ul>
        </div>
@endsection