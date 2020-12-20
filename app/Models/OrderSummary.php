<?php

namespace App\Models;

use App\Abstracts\Model;

class OrderSummary extends Model
{
    public $table = 'order_summary';

    protected $fillable = [
        'order_id',
        'original_original_price_total',
        'original_selling_price_total',
        'profit_total',
    ];
}
