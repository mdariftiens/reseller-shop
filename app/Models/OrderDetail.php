<?php

namespace App\Models;

use App\Abstracts\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function product(): HasOne
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
