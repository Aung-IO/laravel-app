<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

// a blog belongs to category
    public function category(){

        return $this->belongsTo(Category::class);


    }
// a blog belongsto a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
