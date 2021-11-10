<?php

namespace App\Http\Controllers\Writer;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __invoke(Request $request)
    {
        $posts = Post::where('author_id', Auth::id())->paginate(5);
        return view('writer.posts.index', compact('posts'));
    }
}
