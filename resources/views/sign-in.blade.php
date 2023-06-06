@extends('layout')

@section('title', 'BeSocial')
@section('header', 'Hello again!')

@section('content')
    <form action="" method="POST" enctype="multipart/form-data" class="signinform">
        @csrf
        <div>
            <label for="email">Email address</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <button type="submit">Sign in</button>
        </div>
    </form>
@endsection