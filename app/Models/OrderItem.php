<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OrderItem extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $fillable = [
        'product_id',
        'product_extra_id',
        'porcao_id',
        'order_id',
        'ide',
        'price',
        'qtd',
    ];

    protected $dates = ['deleted_at'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function productExtra()
    {
        if ($this->attributes['product_extra_id'] > 0)
        {
            return $this->belongsTo(Product::class, 'product_extra_id', 'id');
        }
        return null;
    }

    public function porcao()
    {
        if ($this->attributes['porcao_id'] > 0)
        {
            return $this->belongsTo(Porcao::class, 'porcao_id', 'id');
        }
        return null;
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
