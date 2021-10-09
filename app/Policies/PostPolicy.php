<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    const UPDATE = 'update';
    const DELETE = 'delete';

    // before method will run before authorize policy. don't need to add  || $user->isAdmin() || $user->isSuperAdmin() in update & delete method if this run

    // public function before(User $user): bool
    // {
    //     return $user->isAdmin() || $user->isSuperAdmin();
    // }

    public function update(User $user, Post $post): bool
    {
        return $post->isAuthoredBy($user) || $user->isAdmin() || $user->isSuperAdmin();
    }

    public function delete(User $user, Post $post): bool
    {
        return $post->isAuthoredBy($user) || $user->isAdmin() || $user->isSuperAdmin();
    }
}
