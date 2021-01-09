<?php

namespace App\Observers;

use App\Abstracts\Observer;
use App\Models\Collection;

class CollectionObserver extends Observer
{
    public function creating(Collection $collection)
    {

        $collection->created_by_user_id = auth()->id();
        $collection->updated_by_user_id = auth()->id();

        return auth()->user()->isAdmin() ||  auth()->user()->isManager() ;
    }

    public function created(Collection $collection)
    {
        return auth()->user()->isAdmin() ||  auth()->user()->isManager() ;
    }

    public function editing(Collection $collection)
    {

        $collection->updated_by_user_id = auth()->id();

        return auth()->user()->isAdmin() ||  auth()->user()->isManager() ;
    }

    public function deleting()
    {
        return auth()->user()->isAdmin() ||  auth()->user()->isManager() ;
    }

}
