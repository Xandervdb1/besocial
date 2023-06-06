@props(['post'])
<div class="projectcard">
    <img src="../{{$post->thumbnailsrc}}" alt="project thumbnail">
    <div class="profilecardheader">
        <h3><a href="/post/{{$post->slug}}">{{$post->title}}</a></h3>
        @auth
            @if(Auth::user()->id == $post->user_id)
                <div class="useractions">
                    <a href="/edit/{{$post->slug}}"><svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                    <button class="btn-open"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M360 184h-8c4.4 0 8-3.6 8-8v8h304v-8c0 4.4 3.6 8 8 8h-8v72h72v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80h72v-72zm504 72H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zM731.3 840H292.7l-24.2-512h487l-24.2 512z"></path></svg></button>
                </div>
            @endif
        @endauth
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