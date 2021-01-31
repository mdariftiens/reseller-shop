<?php

namespace App\Http\Controllers\Backend;

use App\Abstracts\Http\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class MyPaymentController extends Controller
{
    public function index()
    {
        $order = Order::where('created_by_user_id', auth()->id())->where('status', Order::ORDER_STATUS_DELIVERED)->get();

        return view('dashboard.mypayment', compact('order'));
    }

}
