<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Order $order
     * @return mixed
     */
    public function view(User $user, Order $order)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Order $order
     * @return mixed
     */
    public function update(User $user, Order $order)
    {
        return $user->isAdmin() || $user->isManager() || $user->id == $order->created_by_user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Order $order
     * @return mixed
     */
    public function delete(User $user, Order $order)
    {
        return $user->isAdmin() || $user->isManager();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Order $order
     * @return mixed
     */
    public function restore(User $user, Order $order)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Order $order
     * @return mixed
     */
    public function forceDelete(User $user, Order $order)
    {
        //
    }
}
