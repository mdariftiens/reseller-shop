<?php

namespace App\Http\Controllers\Frontend;

use App\Abstracts\Http\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\ShopSetting;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(RegisterUserRequest $request)
    {
        $inputArray = $request->validated();

        $user = User::create(array_merge(request(['name', 'mobile', 'provider', 'provider_id','email']),['type'=>'customer']));

        $shopSettingInputArray = array_merge(
            ['user_id'=>$user->id],
            $request->except(['name', 'mobile', 'provider', 'provider_id','email'])
        );

        ShopSetting::create($shopSettingInputArray);

        Auth::loginUsingId($user->id);

        return redirect()->route('backend.home');

    }

}
