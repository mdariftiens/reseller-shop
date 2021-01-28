<?php

namespace App\Models;

use App\Abstracts\Model;
use Plank\Mediable\Mediable;

class Collection extends Model
{
    use Mediable;

    protected $fillable = [
        'name',
        'enabled',
        'description',
        'created_by_user_id',
        'updated_by_user_id'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
