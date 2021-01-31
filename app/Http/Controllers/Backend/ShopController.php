<?php

namespace App\Http\Controllers\Backend;

use App\Abstracts\Http\Controller;
use App\Models\Order;
use App\Models\ShopSetting;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $list = ShopSetting::collect();

        return view('dashboard.shop.index', compact('list'));
    }

    public function show()
    {

    }

}
