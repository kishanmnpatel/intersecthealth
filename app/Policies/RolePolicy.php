<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

   /**
     * Determine whether the user can see the roles.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return boolean
     */
    public function update(User $user, Role $role)
    {
        if (env('IS_DEMO')){
            return $user->isAdmin() && !in_array($role->id, [1, 2, 3]);
        }
        return $user->isAdmin();
    }
}
