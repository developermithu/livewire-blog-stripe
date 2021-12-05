<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('pages.posts.index');
    }

    public function show(Post $post)
    {
        return view('pages.posts.show', compact('post'));
    }
}
