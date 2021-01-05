<?php


namespace App\Http\Controllers\Frontend;

use App\Abstracts\Http\FrontendController as FrontController;

class FrontEndController extends FrontController
{
    public function index()
    {
        return view('frontend.home');
    }

}
