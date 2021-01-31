<?php

namespace App\Models;

use App\Abstracts\Model;

class ShopSetting extends Model
{
    protected $table = "shop_settings";

    protected $guarded =[

    ];

    protected $with = ['customer'];

    public function customer()
    {
        return $this->hasOne( User::class,'id','user_id');
    }
}
