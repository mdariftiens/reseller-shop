<?php

namespace App\Models;

use App\Abstracts\Model;

class MobileVerification extends Model
{
    protected $table = 'mobile_verification';

    protected $fillable = [
        'mobile',
        'code'
    ];
}
