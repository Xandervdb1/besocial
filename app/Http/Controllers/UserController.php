<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    function showProfile (User $user)
    {
        return view('profile')->with('user', $user);
    }

    function showSignIn () 
    {
        return view('sign-in');
    }

    function showSignUp () 
    {
        return view('sign-up');
    }

    function submitSignUp (Request $request) 
    {
        $user = new User;
        $user->name = $request->name;
        $user->slug = Str::slug($request->name);
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->bio = $request->bio;
        
        $originalPfpName = $request->profilepic->getClientOriginalName();
        $filename = pathinfo($originalPfpName, PATHINFO_FILENAME);
        $extension = pathinfo($originalPfpName, PATHINFO_EXTENSION);
        $user->profilepicsrc = 'storage/profile/' . $user->slug . '/' . Str::slug($filename) . '.' . $extension;
        
        $user->save();
        
        $path = 'public/profile/' . Str::slug($user->name) . '/' . Str::slug($filename) . '.' . $extension;  
        Storage::put($path, file_get_contents($request->profilepic));

        Auth::login($user);
        return redirect('/');
    }

    function submitSignIn (Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/');
        } else {
            return redirect('/sign-in')->with('invalid', true);
        }
    }

    function logout ()
    {
        $user = Auth::user();
        Auth::logout($user);
        return redirect('/');
    }
}
