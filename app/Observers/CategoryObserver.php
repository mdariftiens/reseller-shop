<?php

namespace App\Observers;

use App\Abstracts\Observer;
use App\Models\Cat;

class CategoryObserver extends Observer
{
    public function creating(Cat $cat)
    {
        $cat->created_by_user_id = auth()->id();
        $cat->updated_by_user_id = auth()->id();

        return auth()->user()->isAdmin() ||  auth()->user()->isManager() ;
    }

    public function created(Cat $cat)
    {
        return auth()->user()->isAdmin() ||  auth()->user()->isManager() ;
    }

    public function editing(Cat $cat)
    {
        $cat->updated_by_user_id = auth()->id();

        return auth()->user()->isAdmin() ||  auth()->user()->isManager() ;
    }

    public function edited(Cat $cat)
    {
        return auth()->user()->isAdmin() ||  auth()->user()->isManager() ;
    }

    public function updating()
    {
        return auth()->user()->isAdmin() ||  auth()->user()->isManager() ;
    }

    public function deleting()
    {
        return auth()->user()->isAdmin() ||  auth()->user()->isManager() ;
    }
}
