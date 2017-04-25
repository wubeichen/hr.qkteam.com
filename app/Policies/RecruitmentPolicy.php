<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class RecruitmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the list of recruitments.
     *
     * @param  \App\Models\Member $member
     * @param  \App\Models\Recruitment  $recruitment
     * @return mixed
     */
    public function list(\App\Models\Member $member)
    {
        return $member->isRole('director', 'leader', 'member');
    }

    /**
     * Determine whether the user can view the recruitment.
     *
     * @param  \App\Models\Member $member
     * @param  \App\Models\Recruitment  $recruitment
     * @return mixed
     */
    public function view(\App\Models\Member $member, \App\Models\Recruitment $recruitment)
    {
        return $member->isRole('director', 'leader', 'member');
    }
}
