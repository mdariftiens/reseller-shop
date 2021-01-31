<?php

namespace App\Models;

use App\Abstracts\Model;

class Bonus extends Model
{
    protected $table = 'bonus';

    protected $fillable = [
        'shopsetting_id',
        'bonus_type_id',
        'description',
        'amount',
        'created_by_user_id',
        'updated_by_user_id',

    ];
}
