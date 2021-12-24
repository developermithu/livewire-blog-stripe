<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('pages.posts.index');
    }

    public function show(Post $post)
    {
        $popularPosts = Post::published()->inRandomOrder()->take(3)->get();
        $tags = Tag::orderBy('name', 'asc')->get();
        return view('pages.posts.show', compact('post', 'popularPosts', 'tags'));
    }
}
