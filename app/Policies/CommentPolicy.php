<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    const CREATE = 'create';
    const UPDATE = 'update';
    const DELETE = 'delete';

    // Admin, SuperAdmin and Moderator can do everything
    public function before(User $user): bool
    {
        return $user->isAdmin() || $user->isSuperAdmin() || $user->isModerator();
    }

    // every verified user can create comment
    public function create(User $user): bool
    {
        return $user->hasVerifiedEmail();
    }

    // only admin, auperAdmin, moderator & post creator can update the comment
    public function update(User $user, Post $post): bool
    {
        return $post->isAuthoredBy($user);
    }

    // only admin, auperAdmin, moderator & post creator can delete the comment
    public function delete(User $user, Post $post): bool
    {
        return $post->isAuthoredBy($user);
    }
}
