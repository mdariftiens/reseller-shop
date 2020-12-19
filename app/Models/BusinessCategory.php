<?php

namespace App\Models;

use App\Abstracts\Model;

class BusinessCategory extends Model
{
    protected $table = 'business_category';

    protected $fillable = [
        'name',
        'created_by_user_id',
        'updated_by_user_id',
    ];
}
