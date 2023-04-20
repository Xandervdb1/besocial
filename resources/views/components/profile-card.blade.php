@props(['post'])
<div class="projectcard">
    <img src="../{{$post->thumbnailsrc}}" alt="project thumbnail">
    <h3><a href="/post/{{$post->slug}}">{{$post->title}}</a></h3>
    <p>{{$post->short_desc}}</p>
</div>