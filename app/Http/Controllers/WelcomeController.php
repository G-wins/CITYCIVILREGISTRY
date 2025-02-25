<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class WelcomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get(); // Get all posts
        return view('appointment_welcome', compact('posts'));
    }


    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    
}
