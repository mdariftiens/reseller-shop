<?php

namespace App\Observers;

use App\Abstracts\Observer;
use App\Models\User;

class UserObserver extends Observer
{

    public function creating(User $user)
    {
        if ( auth()->check() ){
            return auth()->user()->isAdmin() ||  auth()->user()->isManager() ;
        }
    }

    public function created(User $user)
    {
        //
    }

    public function editing(User $user): bool
    {
        return auth()->user()->isAdmin()
            ||  auth()->user()->isManager()
            || auth()->user()->isDeliveryMan()
            || auth()->user()->isCustomer();
    }

    public function updating(User $user): bool
    {
        return auth()->user()->isAdmin()
            ||  auth()->user()->isManager()
            || auth()->user()->isDeliveryMan()
            || auth()->user()->isCustomer();
    }


    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function deleting(User $user)
    {
        return $user->id == auth()->id()
            || auth()->user()->isAdmin()
            || auth()->user()->isManager();
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force Deleting" event.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function forceDeleting(User $user): bool
    {
        return $user->id !== auth()->id()
            || auth()->user()->isAdmin();
    }
}
