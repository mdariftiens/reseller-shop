<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    const ADMIN = 'admin';
    const MANAGER = 'manager';
    const DELIVERY_MAN = 'delivery-man';
    const CUSTOMER = 'customer';
    const SUBSCRIBER = 'subscriber';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];

    protected $guarded=[

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'code',
        'code_expire_time',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
//        'email_verified_at' => 'datetime',
    ];


    public function scopeInActive($query)
    {
        return $query->where('is_account_verified', 0);
    }

    public function scopeActive($query)
    {
        return $query->where('is_account_verified', 1);
    }

    public function cats()
    {
        return $this->hasMany( Cat::class,'created_by_user_id','id');
    }

    public function businessCategorys()
    {
        return $this->hasMany( BusinessCategory::class,'created_by_user_id','id');
    }

    public function collections()
    {
        return $this->hasMany( Collection::class, 'created_by_user_id', 'id');
    }

    public function products()
    {
        return $this->hasMany( Product::class, 'created_by_user_id','id');
    }

    public function orders()
    {
        return $this->hasMany( Order::class, 'created_by_user_id', 'id');
    }

    public function paidamounts()
    {
        return $this->hasMany( Paidamount::class , 'customer_user_id', 'id');
    }

    public function notes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany( Note::class,'created_by_user_id','id');
    }

    public function shopSetting(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne( ShopSetting::class, 'user_id', 'id');
    }

    /**
     * User will show Bonus Types
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bonusTypes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany( BonusType::class, 'created_by_user_id', 'id');
    }

    /**
     * Customer will get bonuses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bonuses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany( Bonus::class, 'customer_user_id', 'id');
    }

    public function isAdmin(): bool
    {
        return auth()->user()->type == self::ADMIN;
    }

    public function isManager(): bool
    {
        return auth()->user()->type == self::MANAGER;
    }

    public function isDeliveryMan(): bool
    {
        return auth()->user()->type == self::DELIVERY_MAN;
    }

    public function isCustomer(): bool
    {
        return auth()->user()->type == self::CUSTOMER;
    }

    public function isSubscriber(): bool
    {
        return auth()->user()->type == self::SUBSCRIBER;
    }




}
