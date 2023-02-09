<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
       
        return view('blogs', [
            'blogs' => Blog::latest()->filter(request(['search','category','author']))->get(),
            'categories'=>Category::all(),
            'currentCategory' => Category::where('slug', request('category'))->first()
        ]);
       
    }
}
