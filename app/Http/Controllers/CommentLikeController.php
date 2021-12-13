<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Likes comment
    public function store(Post $post, Comment $comment, Request $request)
    {
        if ($comment->likedBy($request->user())) {
            return response(null, 409);
        };

        $comment->likes()->create(
            [
                'user_id' => $request->user()->id
            ]
        );

        return back();
    }

    // Un-likes comment
    public function destroy(Post $post, Comment $comment, Request $request)
    {
        $request->user()->likes()->where('comment_id', $comment->id)->delete();

        return back();
    }
}
