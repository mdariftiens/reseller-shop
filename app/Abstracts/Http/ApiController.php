<?php

namespace App\Abstracts\Http;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

abstract class ApiController extends BaseController
{

    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        if ($request->expectsJson()) {
            throw new \Exception('Validation Error', $errors);
        }

        return redirect()->to($this->getRedirectUrl())->withInput($request->input())->withErrors($errors, $this->errorBag());
    }
}

