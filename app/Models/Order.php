<?php

namespace App\Models;

use App\Abstracts\Model;

class Order extends Model
{
    public $table = 'orders';

    protected $fillable = [
        'status',
        'deliveryman_user_id',
        'created_by_user_id',
        'updated_by_usr_id'
    ];

    public function orderDetails(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function orderShipping(){
        return $this->hasOne(OrderShipping::class);
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }

    public function deliveryMan(){
        return $this->hasOne(User::class,'id','deliveryman_user_id');
    }

    public function createdBy(){
        return $this->hasOne(User::class,'id','created_by_user_id');
    }

}
