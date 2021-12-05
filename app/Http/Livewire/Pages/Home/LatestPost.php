<?php

namespace App\Http\Livewire\Pages\Home;

use App\Models\Post;
use Livewire\Component;

class LatestPost extends Component
{
    public $count = 3;

    public function loadMore()
    {
        $this->count += 5;
    }

    public function render()
    {
        // $posts = Post::paginate($this->count); OR
        $posts = Post::loadLatest($this->count);  //scopeLoadLatest() from Post Model

        return view('livewire.pages.home.latest-post', compact('posts'));
    }
}
