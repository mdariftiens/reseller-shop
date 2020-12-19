<?php


namespace App\Abstracts\Http;

use App\Traits\Jobs;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


abstract class Controller extends BaseController
{
    use Jobs, AuthorizesRequests, ValidatesRequests;


    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {

    }
}
