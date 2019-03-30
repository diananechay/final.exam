<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class UserPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        if ($user->role_id == 3)
            return true;
        return false;
    }

    public function view(User $user,  User $model)
    {
        if ($model->role_id == 3||$model->id ==$user->id)
            return true;
        return false;
    }

    public function update(User $user, User $model)
    {
        if ($user->role_id == 3 || $model->id==$user->id)
            return true;
        return false;
    }


    public function delete(User $user, User $model)
    {
        if ($user->role_id == 3 || $model->id==$user->id)
            return true;
        return false;
    }

    public function statistics(User $user)
    {
        if ($user->role_id == 3)
            return true;
        return false;
    }

}
