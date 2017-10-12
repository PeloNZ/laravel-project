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
        $post = new Post;
        $post->title = request('title');
        $post->body = request('body');
        $post->save();

        return redirect('/');
    }
}
