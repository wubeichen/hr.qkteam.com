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
            || $user->id === $member->id; // student himself
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

    /**
     * Determine whether the user can update the member's password.
     *
     * @param  \App\Models\Member  $user
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function password(\App\Models\Member $user, \App\Models\Member $member)
    {
        return $user->isRole('director')
            || $user->id === $member->id;
    }

    /**
     * Determine whether the user can change the member's role.
     *
     * @param  \App\Models\Member  $user
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function role(\App\Models\Member $user, \App\Models\Member $member)
    {
        return $user->isRole('director');
    }

    /**
     * Determine whether the user can change the member's active status.
     *
     * @param  \App\Models\Member  $user
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function active(\App\Models\Member $user, \App\Models\Member $member)
    {
        return $user->isRole('director');
    }
}
