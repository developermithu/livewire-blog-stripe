<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Jobs\CreateTag;
use App\Jobs\DeleteTag;
use App\Jobs\UpdateTag;
use App\Models\Tag;
use App\Policies\UserPolicy;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function __construct()
    {
        // Tag Policy
        $this->authorizeResource(Tag::class, 'tag');
    }

    public function index()
    {
        $tags = Tag::latest()->paginate(10);
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(StoreTagRequest $request)
    {
        $this->dispatchSync(CreateTag::formRequest($request));
        return redirect()->route('admin.tags.index')->with('success', 'Tag has been created!');
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $this->dispatchSync(UpdateTag::formRequest($tag, $request));
        return redirect()->route('admin.tags.index')->with('success', 'Tag has been updated!');
    }

    public function destroy(Tag $tag)
    {
        $this->dispatchSync(new DeleteTag($tag));
        return redirect()->route('admin.tags.index')->with('success', 'Tag has been deleted!');
    }
}
