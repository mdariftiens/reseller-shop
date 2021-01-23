<?php

namespace App\Http\Controllers\Frontend;

use App\Abstracts\Http\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\ShopSetting;
use App\Models\User;
use App\Notifications\UserRegisteredNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Notifications\Notification;
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

        $user = User::create(array_merge(request(['name', 'mobile', 'provider', 'provider_id','email']),['type'=>'customer']));

        $shopSettingInputArray = array_merge(
            ['user_id'=>$user->id],
            $request->except(['name', 'mobile', 'provider', 'provider_id','email'])
        );

        $shopSetting = ShopSetting::create($shopSettingInputArray);

        Auth::loginUsingId($user->id);

        $users = User::where('type', User::MANAGER)->OrWhere('type', User::ADMIN)->get();

//        \Notification::send($users, (new DealPublished($deal))->delay($when));
        \Illuminate\Support\Facades\Notification::send($users, new UserRegisteredNotification( $user, $shopSetting) );

//        $users->notify( new UserRegisteredNotification( $user, $shopSetting));

        return redirect()->route('backend.home');

    }

}
