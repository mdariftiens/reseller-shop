<?php

namespace App\Models;

use App\Abstracts\Model;

class OrderDetail extends Model
{
    public $table = 'orderdetail';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'original_price',
        'selling_price',
        'profit',
    ];
}
