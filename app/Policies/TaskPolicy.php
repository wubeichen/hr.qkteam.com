<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create a new task.
     *
     * @param  \App\Models\Member  $user
     * @return mixed
     */
    public function create(\App\Models\Member $user)
    {
        return $user->isRole('director', 'leader');
    }
}
