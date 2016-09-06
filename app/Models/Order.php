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

    public function setTotalAttribute($value)
    {
        $this->attributes['total'] = str_replace(',','.', preg_replace('#[^\d\,]#is','',$value));
    }

    public function getTotalAttribute()
    {
        return number_format($this->attributes['total'], 2, ",", ".");
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
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
}
