<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Policies\UserPolicy;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $this->authorize(UserPolicy::SUPERADMIN, User::class);
        $tags = Tag::paginate(5);
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag)
    {
        //
    }

    public function update(Request $request, Tag $tag)
    {
        //
    }

    public function destroy(Tag $tag)
    {
        //
    }
}
