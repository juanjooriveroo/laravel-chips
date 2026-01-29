<?php

namespace App\Policies;

use App\Models\Meme;
use App\Models\User;

class MemePolicy
{
    /**
     * Determine whether the user can update the meme.
     */
    public function update(User $user, Meme $meme): bool
    {
        return $user->id === $meme->user_id;
    }

    /**
     * Determine whether the user can delete the meme.
     */
    public function delete(User $user, Meme $meme): bool
    {
        return $user->id === $meme->user_id;
    }
}
