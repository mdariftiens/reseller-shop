<?php

namespace App\Observers;

use App\Abstracts\Observer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductObserver extends Observer
{

    /**
     * Handle the Order "creating" event.
     *
     * @param Product $product
     * @return bool
     */
    public function creating(Product $product)
    {
        $user = auth()->user();

       if (  auth()->check() && ( $user->isAdmin() || $user->isManager() ) ){

           $product->created_by_user_id = auth()->id();
           $product->updated_by_user_id = auth()->id();
           return true;;
       }

    }

    /**
     * Handle the Order "created" event.
     *
     * @param Product $product
     * @return void
     */
    public function created(Product $product)
    {
        //
    }

    /**
     * Handle the Order "updating" event.
     *
     * @param Product $product
     * @return bool
     */
    public function updating(Product $product)
    {
        $user = auth()->user();

        return $user->isAdmin() || $user->isManager() ;
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param Product $product
     * @return void
     */
    public function updated(Product $product)
    {

    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param Product $product
     * @return void
     */
    public function deleting(Product $product)
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param Product $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the Order "restoring" event.
     *
     * @param Product $product
     * @return void
     */
    public function restoring(Product $product)
    {
        //
    }
    /**
     * Handle the Order "restored" event.
     *
     * @param Product $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Order "force deleting" event.
     *
     * @param Product $product
     * @return void
     */
    public function forceDeleting(Product $product)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param Product $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
