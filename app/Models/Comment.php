<?php

namespace App\Models;

use App\Traits\HasAuthor;
use App\Traits\HasCommentable;
use App\Traits\HasReplies;
use App\Traits\ModelHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Comment extends Model
{
    use HasFactory;
    // Custom Trait
    use HasAuthor;
    use ModelHelpers;
    use HasCommentable;
    use HasReplies;

    const TABLE = 'comments';
    protected $table = self::TABLE;

    protected $fillable = [
        'body',
        'parent_id',
        'depth',
    ];

    // Eager Load The Relationship like  [Comment::with('replies')]
    protected $with = [
        'authorRelation',
        'repliesRelation',
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function parentId(): ?int
    {
        return $this->parent_id;
    }

    public function body(): string
    {
        return $this->body;
    }

    public function excerpt(int $limit = 100): string
    {
        return Str::limit(strip_tags($this->body()), $limit, '...');
    }
}
