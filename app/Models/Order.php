<?php

namespace App\Models;

use App\Abstracts\Model;

class Order extends Model
{
    public $table = 'orders';

    protected $fillable = ['status', 'deliveryman_user_id', 'created_by_user_id', 'updated_by_usr_id'    ];

}
