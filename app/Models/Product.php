<?php

namespace App\Models;

use App\Abstracts\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Plank\Mediable\Mediable;

class Product extends Model
{
    use Mediable;

    protected $fillable = [
    ];

    protected $guarded = [];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Cat::class );
    }

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    /**
     * Get the current balance.
     *
     * @return string
     */
    public function getFbImageAttribute($value)
    {
        if (!empty($value) && !$this->hasMedia('fb-image')) {
            return $value;
        } elseif (!$this->hasMedia('fb-image')) {
            return false;
        }

        return $this->getMedia('fb-image')->last();
    }
}
