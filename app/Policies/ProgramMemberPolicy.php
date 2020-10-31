<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgramMemberPolicy
{
    use HandlesAuthorization;

    /**
     * @param \App\User $user
     *
     * @return bool
     */
    public function create(User $user)
    {
        return $user->isMember();
    }
}
