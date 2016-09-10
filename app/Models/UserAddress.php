<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserAddress extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'user_id',
		'address',
		'complement',
        'reference_point',
		'number',
		'neighborhood',
		'city',
		'state',
		'zipcode',
		'status',
	];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_delivery_addresses', 'order_id', 'user_address_id');
    }

}
