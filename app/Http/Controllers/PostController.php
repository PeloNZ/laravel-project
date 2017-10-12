<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        
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

        Post::create([
            'title' => request('title'),
            'body' => request('body')
        ]);

        return redirect('/');
    }
}
