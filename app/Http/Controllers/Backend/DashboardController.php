<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Abstracts\Http\Controller;

class DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $request->validate([
            'roll'=>'integer',
            'amount'=>'integer',
        ]);

    }
}
