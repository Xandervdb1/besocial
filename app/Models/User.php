<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    function posts()
    {
        return $this->hasMany(Post::class);
    }

    use HasFactory;
}
