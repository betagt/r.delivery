<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProductPorcao extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'product_id', 'porcao_id', 'preco',
	];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function porcao()
    {
        return $this->belongsTo(Porcao::class, 'porcao_id', 'id');
    }


    public function setPrecoAttribute($value)
    {
        $this->attributes['preco'] = str_replace(',','.', preg_replace('#[^\d\,]#is','',$value));
    }

    public function getPrecoAttribute()
    {
        return number_format($this->attributes['preco'], 2, ",", ".");
    }
}
