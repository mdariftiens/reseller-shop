<?php

namespace App\Http\Controllers\Backend;

use App\Abstracts\Http\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markAllAsARead()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return back();
    }

    public function markAsARead($notificationId)
    {
        return auth()->user()->unreadNotifications->where('id', $notificationId)->markAsRead();
    }

}
