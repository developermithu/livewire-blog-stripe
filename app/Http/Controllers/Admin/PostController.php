<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Jobs\CreatePost;
use App\Jobs\DeletePost;
use App\Jobs\UpdatePost;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
        // Post Policy
        return $this->authorizeResource(Post::class, 'post');
    }

    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('admin.posts.create', compact('tags'));
    }

    public function store(StorePostRequest $request)
    {

        $image = $request->image;
        $imgName = uniqid() . '.' . $image->extension(); //same as getClientOriginalExtension()
        $image->storeAs('/media/posts', $imgName, 'public');

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'image' => $imgName,
            'published_at' => $request->published_at,
            'photo_credit_text' => $request->photo_credit_text,
            'photo_credit_link' => $request->photo_credit_link,
            'tags' => $request->tags,
            'is_commentable' => $request->isCommentable ? false : true,
            'author_id' => auth()->id(),
        ]);

        $post->authoredBy($request->author());
        $post->syncTags($request->tags);

        // $this->dispatchSync(CreatePost::formRequest($request)); //jobs
        return redirect()->route('admin.posts.index')->with('success', 'Post has been created!');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'tags' => Tag::all(),
            'selectedTags' => old('tags', $post->tags()->pluck('id')->toArray())
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {

        if ($request->image) {
            Storage::disk('public')->delete('/media/posts/' . $post->image);

            $image = $request->image;
            $imgName = uniqid() . '.' . $image->extension(); //same as getClientOriginalExtension()
            $image->storeAs('/media/posts', $imgName, 'public');
        }

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'image' => $request->image ? $imgName : $post->image,
            'published_at' => $request->published_at,
            'photo_credit_text' => $request->photo_credit_text,
            'photo_credit_link' => $request->photo_credit_link,
            'tags' => $request->tags,
            'is_commentable' => $request->isCommentable ? false : true,
            'author_id' => auth()->id(),
        ]);

        $post->authoredBy($request->author());
        $post->syncTags($request->tags);

        // $this->dispatchSync(UpdatePost::formRequest($post, $request));
        return redirect()->route('admin.posts.index')->with('success', 'Post has been updated!');
    }

    public function destroy(Post $post)
    {
        $this->dispatchSync(new DeletePost($post));
        return redirect()->route('admin.posts.index')->with('success', 'Post has been deleted!');
    }
}
