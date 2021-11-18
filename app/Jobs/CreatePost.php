<?php

namespace App\Jobs;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use App\Services\SaveImageService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class CreatePost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $author;
    private $title;
    private $body;
    private $image;
    private $publishedAt;
    private $photoCreditText;
    private $photoCreditLink;
    private $tags;
    private $type;
    private $isCommentable;

    public function __construct(
        string $title,
        string $body,
        ?string $image,
        string $publishedAt,
        ?string $photoCreditText,
        ?string $photoCreditLink,
        string $type,
        User $author,
        ?bool $isCommentable,
        array $tags = [],
    ) {
        $this->title = $title;
        $this->body = $body;
        $this->image = $image;
        $this->publishedAt = $publishedAt;
        $this->photoCreditText = $photoCreditText;
        $this->photoCreditLink = $photoCreditLink;
        $this->type = $type;
        $this->author = $author;
        $this->isCommentable = $isCommentable;
        $this->tags = $tags;
    }

    public static function formRequest(StorePostRequest $request): self
    {
        return new static(
            $request->title(),
            $request->body(),
            $request->image(),
            $request->publishedAt(),
            $request->photoCreditText(),
            $request->photoCreditLink(),
            $request->type(),
            $request->author(),
            $request->isCommentable(),
            $request->tags(),
        );
    }

    public function handle(): Post
    {
        $post = new Post([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'body' => $this->body,
            'published_at' => $this->publishedAt,
            'photo_credit_text' => $this->photoCreditText,
            'photo_credit_link' => $this->photoCreditLink,
            'type' => $this->type,
            'is_commentable' => $this->isCommentable ? false : true,
        ]);

        $post->authoredBy($this->author);
        $post->syncTags($this->tags);
        SaveImageService::UploadImage($this->image, $post, Post::TABLE);

        return $post;
    }
}
