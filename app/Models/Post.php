<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'image_path'
    ];
    // Returns the owner user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Returns all likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Checks if the comment has already been liked by the current user
    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    // Comments on this post
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
