<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $blog->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);
        return back();
    }
}