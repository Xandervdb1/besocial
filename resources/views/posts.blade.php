@extends('layout')

@section('title', 'BeSocial')
@if (isset($filteredByTag))
    @section('header', 'All Posts tagged with "' . $tag->tag . '"')
@elseif (isset($filteredBySearch))
@section('header', 'All Posts with "' . $request->search . '" in the title')
@else
    @section('header', 'Projects')
@endif

@section('content')
@if ($posts->isEmpty())
    <div class="noposts">
        <img src="../storage/noposts.png" alt="no posts" class="nopostimg">
        <p>Nothing to show yet.</p>
    </div>
@endif
<div class="cardcontainerpadding">
    <div class="cardcontainer">
        @foreach ($posts as $post)
            <x-project-card :post="$post"/>
        @endforeach
    </div>
</div>
@endsection