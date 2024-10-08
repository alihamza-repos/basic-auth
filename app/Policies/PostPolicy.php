<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function update(User $user, Post $post)
{
    return $user->id === $post->user_id; // Only allow if the user created the post
}

public function delete(User $user, Post $post)
{
    return $user->id === $post->user_id; // Only allow if the user created the post
}

}
