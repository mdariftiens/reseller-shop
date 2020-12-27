<?php

namespace App\Models;

use App\Abstracts\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{

    protected $fillable = [
        'name',
        'code',
        'description',
        'enabled',
        'collection_id',
        'regular_price',
        'offer_price',
        'delivery_within_days',
    ];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['created_by_user_id'] = 3;
        $this->attributes['updated_by_user_id'] = 3;

    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Cat::class );
    }

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }


}
