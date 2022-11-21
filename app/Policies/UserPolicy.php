<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response
     */
    public function view(User $user, User $model)
    {
        return ($user->id === $model->id || $user->hasRole('admin') || $user->hasRole('employee'))
            ? Response::allow()
            : Response::denyWithStatus(404);
    }

}
