<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function showProfile (User $user)
    {
        return view('profile')->with('user', $user);
    }
}
