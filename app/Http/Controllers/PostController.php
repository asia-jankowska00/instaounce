<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Shows the posts page
    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(10);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    // Shows single post page
    public function show(Post $post) {
        return view('posts.show',[
            'post' => $post
        ]);
    }
    

    // Shows post create form
    public function new() {
        return view('posts.new');
    }

    public function store(Request $request)
    {
        // make sure the image is an image and not too large
        $this->validate($request, [
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();  

        // upload the image to public folder
        $request->image->move(public_path('images'), $imageName);

        $request->user()->posts()->create([
            'body' => $request->body,
            'image_path' => $imageName,
        ]);

        return redirect()->route('posts');
    }

    // delete a post, if the user has the 'delete' permission/policy
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}
