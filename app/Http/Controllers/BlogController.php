<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;

use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {

        $blogs = Blog::with('category')->latest()->get();


        return view('blogs', [

            'blogs' => $blogs,
            'categories' => Category::all()

        ]);
    }

    public function show(Blog $blog)
    {


        return view('blog', [
            'blog' => $blog,
            'randomBlogs' => Blog::inRandomOrder()->take(3)->get()


        ]);
    }
}
