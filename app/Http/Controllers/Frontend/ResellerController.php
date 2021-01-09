<?php


namespace App\Http\Controllers\Frontend;

use App\Abstracts\Http\FrontendController as FrontController;

class ResellerController extends FrontController
{
    public function index()
    {
        return view('frontend.reseller');
    }

}
