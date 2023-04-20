@props(['post'])
<div class="projectcard">
    <img src="../{{$post->thumbnailsrc}}" alt="project thumbnail">
    <h3><a href="/post/{{$post->slug}}">{{$post->title}}</a></h3>
    <div class="tags">
        @foreach ($post->tags as $tag)
            <p class="tag" style="background-color: {{$tag->color}}">{{$tag->tag}}</p>
        @endforeach
    </div>
    <p class="shortdesc">{{$post->short_desc}}</p>
    <hr>
    <div class="bottom">
        <a href="/profile/{{$post->user->slug}}">{{$post->user->name}}</a>
    </div>
</div>