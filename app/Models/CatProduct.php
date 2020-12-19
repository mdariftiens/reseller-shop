<?php

namespace App\Models;

use App\Abstracts\Model;

class CatProduct extends Model
{
    protected $table = 'cat_product';

    protected $fillable = [
        'cat_id',
        'product_id',
    ];
}
