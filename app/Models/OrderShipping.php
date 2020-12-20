<?php

namespace App\Models;

use App\Abstracts\Model;

class OrderShipping extends Model
{
    public $table = 'order_shipping';

    protected $fillable = [
        'order_id',
        'name',
        'address',
        'optional_address',
        'mobile_number',
    ];
}
