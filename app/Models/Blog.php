<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // a blog belongs to category
    public function category()
    {

        return $this->belongsTo(Category::class);
    }
    // a blog belongsto a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filter)
    {
        $query->when(
            $filter['search'] ?? false,
            function ($query, $search) {
                $query = $query
                    ->where(
                        function ($query) use ($search) {
                            $query->where('title', 'LIKE', '%' . $search . '%')
                                ->orWhere('body', 'LIKE', '%' . $search . '%');
                        }
                    );
            }

        );
        $query->when(
            $filter['category'] ?? false,
            function ($query, $slug) {
                $query->whereHas(
                    'category',
                    function ($query) use ($slug) {
                        $query->where('slug', $slug);
                    }
                );
            }

        );
        $query->when(
            $filter['user'] ?? false,
            function ($query, $name) {
                $query->whereHas(
                    'user',
                    function ($query) use ($name) {
                        $query->where('name', $name);
                    }
                );
            }

        );
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function subscribedUsers()
    {
        return $this-> belongsToMany(User::class,'blog_user');
    }

}
