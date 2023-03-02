<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // a user has many blogs
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    //mutator
    public function setPasswordAttribute($value)
    {

        $this->attributes['password'] = bcrypt($value);
    }

    //accessor
    public function getNameAttribute($value)
    {
        return ucfirst($value); //uppercase
    }

    public function getProfileAttribute($value)
    {
       
       //return $value ? $value : "https://thumbs.dreamstime.com/b/default-avatar-profile-icon-social-media-user-vector-image-icon-default-avatar-profile-icon-social-media-user-vector-image-209162840.jpg";
    return $value ? $value : "/images/default_profile_pic.jpg";
    }

    public function subscribedBlogs()
    {
        return $this->BelongsToMany(Blog::class);
    }

    public function isSubscribed($blog)
    {
        return $this->subscribedBlogs && $this->subscribedBlogs->contains('id',$blog->id);
    }
}
