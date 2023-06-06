@props(['post'])
<div class="projectcard">
    <img src="../{{$post->thumbnailsrc}}" alt="project thumbnail">
    <h3><a href="/post/{{$post->slug}}">{{$post->title}}</a></h3>
    <div class="authorlink">
        <a href="/profile/{{$post->user->slug}}"><img src="../{{$post->user->profilepicsrc}}" alt="profile picture"></a>
        <a href="/profile/{{$post->user->slug}}">{{$post->user->name}}</a>
    </div>
    <div class="tags">
        @foreach ($post->tags as $tag)
            <p class="tag" style="background-color: {{$tag->color}}">{{$tag->tag}}</p>
        @endforeach
    </div>
    <p class="shortdesc">{{$post->short_desc}}</p>
    <hr>
    <div class="bottom">
        <div>
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1" viewBox="0 0 48 48" enable-background="new 0 0 48 48" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="#FFCDD2" d="M34,9c-4.2,0-7.9,2.1-10,5.4C21.9,11.1,18.2,9,14,9C7.4,9,2,14.4,2,21c0,11.9,22,24,22,24s22-12,22-24 C46,14.4,40.6,9,34,9z"></path></svg>
            <p>0</p>
        </div>
        <p>{{$post->created_at->diffForHumans()}}</p>
    </div>
</div>