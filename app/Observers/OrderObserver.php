<?php

namespace App\Observers;

use App\Abstracts\Observer;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class OrderObserver extends Observer
{

    /**
     * Handle the Order "creating" event.
     *
     * @param  \App\Models\Order  $order
     * @return bool
     */
    public function creating(Order $order)
    {

        if ( auth()->check() ){
            $order->created_by_user_id = auth()->id();
            $order->updated_by_user_id = auth()->id();
            return true;
        }

        return false;

    }

    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        //
    }

    /**
     * Handle the Order "updating" event.
     *
     * @param  \App\Models\Order  $order
     * @return bool
     */
    public function updating(Order $order)
    {
        $user = auth()->user();

        return $user->isAdmin() || $user->isManager() || $user->isDeliveryMan() || $order->created_by_user_id == $user->id;
    }
    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        Log::error(__METHOD__);
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleting(Order $order)
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restoring" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restoring(Order $order)
    {
        //
    }
    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleting" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleting(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
