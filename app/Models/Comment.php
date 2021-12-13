<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // The properties that can be defined from the $request
    protected $fillable = [
        'body',
        'user_id'
    ];

    // Returns the owner user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Returns the parent post
    public function post()
    {
        return $this->belongsTo(Post::class);
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
}
