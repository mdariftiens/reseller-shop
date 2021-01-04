<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\ShopSettingRequest;
use App\Models\ShopSetting;
use App\Models\User;
use Illuminate\Http\Request;
use App\Abstracts\Http\Controller;

class ShopSettingController extends Controller
{
    public function index()
    {

    }


    public function create()
    {
        return view('dashboard.shop_setting.create');
    }

    public function store(ShopSettingRequest $request)
    {

        User::find(3)->shopSetting->create( $request->validated());

    }

    public function show( $id)
    {
        $user  = User::find(3);

        if ($user->has('shopSetting')){
            $shopSettings = $user->shopSetting;
            return view('dashboard.shop_setting.show',compact('shopSettings'));
        }

        return redirect()->route('shop_setting.create');

    }

    public function edit($id)
    {
        $user  = User::find(3);

        if ($user->has('shopSetting')){
            $shopSettings = $user->shopSetting;
            return view('dashboard.shop_setting.edit',compact('shopSettings'));
        }

        return redirect()->route('shop-setting.create');
    }

    public function update(ShopSettingRequest $request)
    {
        $shopSetting = User::find(3)->shopSetting;
        $shopSetting->update( $request->validated());
        return redirect()->route('shop-setting.show', $shopSetting->user_id);
    }

}
