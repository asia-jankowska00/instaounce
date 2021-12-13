<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(('auth'));
    }

    // Creates a comment
    public function store(Post $post, Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $post->comments()->create(
            [
                'user_id' => $request->user()->id,
                'body' => $request->body
            ]
        );

        return back();
    }

    // Deletes a comment
    public function destroy(Post $post, Request $request)
    {
        $request->user()->comments()->where('post_id', $post->id)->delete();

        return back();
    }
}
