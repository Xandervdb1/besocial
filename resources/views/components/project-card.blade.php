@props(['post'])
<li>
    <h2><a href="/post/{{$post->slug}}">{{$post->title}}</a></h2>
    <img src={{asset('storage/thumbnails/default.png')}} alt="">
    <p><a href="/profile/{{$post->user->slug}}">{{$post->user->name}}</a></p>
    <p>{{$post->short_desc}}</p>
</li>