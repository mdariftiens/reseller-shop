<?php

namespace App\Models;

use App\Abstracts\Model;

class BusinessCategory_ShopSetting extends Model
{
    protected $table = 'BusinessCategory_ShopSetting';

    protected $fillable = [
        'business_category_id',
        'shop_setting_id',
    ];
}
