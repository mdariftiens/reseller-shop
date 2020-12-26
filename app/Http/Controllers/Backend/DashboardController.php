<?php

namespace App\Http\Controllers\Backend;

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

}
