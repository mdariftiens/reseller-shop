<?php

namespace App\Models;

use App\Abstracts\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    public $table = 'orders';

    protected $fillable = [
        'status',
        'deliveryman_user_id',
        'created_by_user_id',
        'updated_by_usr_id'
    ];

    const ORDER_STATUS_NOT_ACCEPTED = 'ORDER_STATUS_NOT_ACCEPTED';
    const ORDER_STATUS_PENDING = 'ORDER_STATUS_PENDING';
    const ORDER_STATUS_ON_THE_WAY = 'ORDER_STATUS_ON_THE_WAY';
    const ORDER_STATUS_DELIVERED = 'ORDER_STATUS_DELIVERED';
    const ORDER_STATUS_CANCEL = 'ORDER_STATUS_CANCEL';
    const ORDER_STATUS_RETURNED = 'ORDER_STATUS_RETURNED';

    public function orderDetails(): HasMany
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

    /**
     * Scope to get all rows paginated.
     *
     * @param Builder $query
     * @param $sort
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function scopeCollect($query, $sort = 'id')
    {

        $user= auth()->user();

        $list = $query;

        $list->userDependentQuery();


        if ( request()->status != ''){
            $list->where('status', request()->status);
        }else{

            if ($user->isCustomer()){
                $list->where(function ($q){
                    $q->where('status', Order::ORDER_STATUS_NOT_ACCEPTED);
                    $q->OrWhere('status', Order::ORDER_STATUS_PENDING);
                    $q->OrWhere('status', Order::ORDER_STATUS_ON_THE_WAY);
                });


            }elseif ( $user->isDeliveryman()){
                $list->where(function ($q){
                    $q->where('status', Order::ORDER_STATUS_NOT_ACCEPTED);
                    $q->OrWhere('status', Order::ORDER_STATUS_PENDING);
                    $q->OrWhere('status', Order::ORDER_STATUS_ON_THE_WAY);
                });
            }
            else{

            }
        }

        if ( request()->deliveryMan != ''){
            $list->where('deliveryman_user_id',  request()->deliveryMan );
        }

        $list = $list->with([
            'orderDetails',
            'notes',
            'deliveryMan',
            'createdBy',
            'orderShipping',])->get();

        if ( request()->key != ''){
            $list = $list->filter(function($item) {
                return strpos($item->orderShipping->name,  request()->key)!==false;
            });
        }

        return $list->paginate(env('ORDER_PAGINATE_LIMIT'));
    }

    public function scopeUserDependentQuery($query)
    {
        $user = auth()->user();

        if ( $user->isDeliveryMan()){

            $query->where('deliveryman_user_id', $user->id);
        }

        if ( $user->isCustomer()){
            $query->where('created_by_user_id', $user->id);
        }

    }

}
