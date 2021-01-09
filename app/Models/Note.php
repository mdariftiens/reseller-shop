<?php

namespace App\Models;

use App\Abstracts\Model;

class Note extends Model
{
    protected $fillable = [
        'order_id',
        'note',
        'created_by_user_id',
        'updated_by_user_id',
    ];

    public function setNoteAttribute($name)
    {
        $this->attributes['note'] = $name;
        $this->attributes['created_by_user_id'] = auth()->id();
        $this->attributes['updated_by_user_id'] = auth()->id();
    }
}
