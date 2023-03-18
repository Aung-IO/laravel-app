<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index (){
    
        return view('admin.index',
    ['categories' => Category::all()]);
    }

    public function store()
    {
     $cleanData =  request()->validate([
        "title" => ["required"],
        "slug" => ["required"],
        "body" => ["required"],
        "category_id" => ["required", Rule::exists('categories','id')],
      ]);

      $cleanData['user_id'] = auth()->id();
      Blog::create($cleanData);
      return redirect('/');
    }
}
