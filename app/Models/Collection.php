<?php

namespace App\Models;

use App\Abstracts\Model;

class Collection extends Model
{
    protected $fillable = [
        'name',
        'enabled',
        'description',
        'created_by_user_id',
        'updated_by_user_id'
    ];

}
