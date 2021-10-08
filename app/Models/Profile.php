<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'bio',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
    ];

    public function bio(): string
    {
        return $this->bio;
    }

    public function facebook(): string
    {
        return $this->facebook;
    }

    public function instagram(): string
    {
        return $this->instagram;
    }

    public function twitter(): string
    {
        return $this->twitter;
    }

    public function linkedin(): string
    {
        return $this->linkedin;
    }

    /**
     * Get the user that owns the Profile
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
