<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::latest()->get();
        
        return view('post.index', [
            'posts' => $posts
        ]);
    }
    
    public function show(Post $post)
    {
        return view('post.show', [
            'post' => $post
        ]);
    }
    
    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|max:10',
            'body' => 'required'
        ]);

        // AUTHenticated USER PUBLISHes a new POST
        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        return redirect('/');
    }
}
