<?php

namespace App\Http\Controllers\Backend;

use App\Models\Cat;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;
use \App\Abstracts\Http\Controller;

class DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        return view('home');
    }

    public function show()
    {


        $categoryCount = Cat::enabled()->count();

        $productCount = Product::enabled()->count();

        $collectionCount = Collection::enabled()->count();

        return view('welcome',compact('categoryCount', 'productCount', 'collectionCount'));
    }

}
