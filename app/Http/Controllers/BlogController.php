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
       
        return view('blogs.index', [

            'blogs' => Blog::latest()->filter(request(['search','category','user']))->paginate(6),
            

        ]);
    } 
     
    public function show(Blog $blog)
    {


        return view('blogs.show', [
            'blog' => $blog->load('comments'),
            'randomBlogs' => Blog::inRandomOrder()->take(3)->get(),


        ]);
    }
}
