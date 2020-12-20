<?php

namespace App\Models;

use App\Abstracts\Model;

class Paidamount extends Model
{
    protected $table = 'paidamount';

    protected $fillable = [
        'customer_user_id',
        'method',
        'note',
        'amount',
        'created_by_user_id',
        'updated_by_user_id',
    ];
}
