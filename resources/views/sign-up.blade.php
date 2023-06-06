@extends('layout')

@section('title', 'BeSocial')
@section('header', 'Sign up to BeSocial')

@section('content')
    <form action="/sign-up" method="POST" enctype="multipart/form-data" class="signinform">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="email">Email address</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="repeatpassword">Repeat password</label>
            <input type="password" name="repeatpassword" id="repeatpassword">
        </div>
        <div>
            <label for="profilepic">Profile picture</label>
            <input type="file" name="profilepic" id="profilepic">
        </div>
        <div>
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" cols="30" rows="5"></textarea>
        </div>
        <div>
            <button type="submit">Sign up</button>
        </div>
    </form>
@endsection