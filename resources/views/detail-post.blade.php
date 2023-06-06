@extends('layout')

@section('title', 'BeSocial')
@section('header', $post->title)
@section('headerclass', 'hidden')

@section('content')
    <div class="detailcontent">
        <div class="detailheader">
            <div class="authordate">
                <div>
                    <a href="/profile/{{$post->user->slug}}"><img src="../{{$post->user->profilepicsrc}}" alt="profile picture"></a>
                    <a href="/profile/{{$post->user->slug}}"><div class="underline">{{$post->user->name}}</div></a>
                </div>
                <p>{{$post->created_at->format('d-m-Y')}}</p>
            </div>
            <h1>{{$post->title}}</h1>
            <div class="tagslikes">
                <div class="detailtags">
                    @foreach ($post->tags as $tag)
                        <a href="/posts/{{$tag->slug}}" style='background-color: {{$tag->color}}'>{{$tag->tag}}</a>
                    @endforeach
                </div>
                <div class="likes">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1" viewBox="0 0 48 48" enable-background="new 0 0 48 48" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="#FFCDD2" d="M34,9c-4.2,0-7.9,2.1-10,5.4C21.9,11.1,18.2,9,14,9C7.4,9,2,14.4,2,21c0,11.9,22,24,22,24s22-12,22-24 C46,14.4,40.6,9,34,9z"></path></svg>
                    <p>0 likes</p>
                </div>
            </div>
        </div>
        <div class="detailinfo">
            <p class="detaildesc">{{$post->description}}</p>
            <img src="../{{$post->thumbnailsrc}}" alt="project thumbnail">
            <a href="{{$post->link}}"><button>Go check it out</button></a>
        </div>
    </div>
@endsection