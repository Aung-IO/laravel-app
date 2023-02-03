<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user)
    {
       
        return view('blogs', [
            'blogs' => $user->blogs,
            'categories'=>Category::all()
        ]);
       
    }
}
