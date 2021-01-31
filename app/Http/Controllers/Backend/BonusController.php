<?php

namespace App\Http\Controllers\Backend;

use App\Abstracts\Http\Controller;
use App\Http\Requests\BonusRequest;
use App\Models\Bonus;
use App\Models\BonusType;
use App\Models\Order;
use App\Models\ShopSetting;
use Illuminate\Http\Request;

class BonusController extends Controller
{

    public function edit($id)
    {
        $shop = ShopSetting::findOrFail($id);

        $bonusType = BonusType::all()->pluck('name','id')->toArray();

        return view('dashboard.bonus.edit', compact('shop','bonusType'));
    }

    public function store(BonusRequest $request)
    {
        $validatedArray = $request->validated();

        $validatedArray['created_by_user_id'] = auth()->id();
        $validatedArray['updated_by_user_id'] = auth()->id();

        Bonus::create($validatedArray);

        flash("Bonus Added To " . ShopSetting::find($validatedArray['shopsetting_id'])->shop_name)->success();

        return redirect()->route('shop.index');
    }

}
