<?php

namespace App\Models;

use App\Casts\TitleCast;
use App\Contracts\CommentAble;
use App\Traits\HasAuthor;
use App\Traits\HasComments;
use App\Traits\HasTags;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model implements CommentAble
{
    use HasFactory;

    // Custom Trait
    use HasAuthor;
    use HasTags;
    use HasComments;

    const TABLE = 'posts';
    protected $table = self::TABLE;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'image',
        'published_at',
        'type',
        'photo_credit_text',
        'photo_credit_link',
        'author_id',
        'is_commentable',
    ];

    // Eager Load The Relationship like Post::with(['user', 'tags', 'comments'])
    protected $with = [
        'authorRelation',
        'tagsRelation',
        'commentsRelation',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'title' => TitleCast::class,
        'is_commentable' => 'boolean',
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function body(): string
    {
        return $this->body;
    }

    public function excerpt(int $limit = 250): string
    {
        return Str::limit(strip_tags($this->body()), $limit, '...');
    }

    public function image(): ?string
    {
        return $this->image;  // should image
    }

    public function type(): string
    {
        return $this->type;
    }

    public function isCommentable(): bool
    {
        return $this->is_commentable;
    }

    public function publishedAt(): string
    {
        return $this->published_at->format('Y-m-d');
    }

    // automatically remove tags when destroy the post
    public function delete()
    {
        $this->removeTags();
        parent::delete();
    }

    public function commentAbleTitle(): string
    {
        return $this->title();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeLoadLatest(Builder $query, $count = 5)
    {
        return $query->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest()
            ->paginate($count);
    }
}
