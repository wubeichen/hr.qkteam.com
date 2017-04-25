<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the list of members.
     *
     * @param  \App\Models\Member  $user
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function list(\App\Models\Member $user)
    {
        return $user->isRole('director', 'leader', 'member');
    }

    /**
     * Determine whether the user can view the member.
     *
     * @param  \App\Models\Member  $user
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function view(\App\Models\Member $user, \App\Models\Member $member)
    {
        return $user->isRole('director', 'leader', 'member')
            || $user->id === $member->id;
    }

    /**
     * Determine whether the user can create members.
     *
     * @param  \App\Models\Member  $user
     * @return mixed
     */
    public function create(\App\Models\Member $user)
    {
        return $user->isRole('director', 'leader');
    }

    /**
     * Determine whether the user can update the member.
     *
     * @param  \App\Models\Member  $user
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function update(\App\Models\Member $user, \App\Models\Member $member)
    {
        return $user->isRole('director', 'leader')
            || $user->id === $member->id;
    }
}
