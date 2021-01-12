<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class NotificationComponent extends Component
{
    public $unreadNotifications;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->unreadNotifications = Auth::user()->unreadNotifications  ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.notification-component');
    }
}
