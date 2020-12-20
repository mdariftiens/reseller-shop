<?php

namespace App\Models;

use App\Abstracts\Model;

class BonusType extends Model
{
    protected $fillable = [
        'name',
        'created_by_user_id',
        'updated_by_user_id'
    ];
}
