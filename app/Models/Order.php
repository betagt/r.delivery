<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $fillable = [
        'client_id',
        'cupom_id',
        'user_deliveryman_id',
        'estabelecimento_id',
        'total',
        'taxa_entrega',
        'status'
    ];

    protected $dates = ['deleted_at'];

    public function transform()
    {
        return [
            'order' => $this->id,
            'items' => $this->items,
        ];
    }

    /*public function setTotalAttribute($value)
    {
        $this->attributes['total'] = str_replace(',','.', preg_replace('#[^\d\,]#is','',$value));
    }

    public function getTotalAttribute()
    {
        return number_format($this->attributes['total'], 2, ",", ".");
    }*/

    /*public function setTaxaEntregaAttribute($value)
    {
        $this->attributes['taxa_entrega'] = str_replace(',','.', preg_replace('#[^\d\,]#is','',$value));
    }*/
/*
    public function getTaxaEntregaAttribute()
    {
        return number_format($this->attributes['taxa_entrega'], 2, ",", ".");
    }*/

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function cupom()
    {
        return $this->belongsTo(Cupom::class, 'cupom_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function deliveryman()
    {
        return $this->belongsTo(User::class, 'user_deliveryman_id', 'id');
    }

    public function estabelecimento()
    {
        return $this->belongsTo(Estabelecimento::class, 'estabelecimento_id', 'id');
    }

    public function avaliacao()
    {
        return $this->hasOne(OrderAvaliacao::class, 'order_id', 'id');
    }

    public function deliveryAddresses()
    {
        return $this->belongsToMany(UserAddress::class, 'order_delivery_addresses', 'order_id', 'user_address_id');
    }


}
