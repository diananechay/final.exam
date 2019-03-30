<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return true;
    }

    public function delete(User $user, Order $order)
    {
        if($user->role_id==3 || $order->user_id==$user->id)
            return true;
        if($user->id==$order->vacancy->creator_id)
            return true;
        else
            return false;
    }

}
