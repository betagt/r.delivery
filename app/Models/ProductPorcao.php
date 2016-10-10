<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProductPorcao extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'product_id',
		'nome',
		'preco',
	];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function setPrecoAttribute($value)
    {
        $this->attributes['preco'] = str_replace(',','.', preg_replace('#[^\d\,]#is','',$value));
    }

    public function getPrecoAttribute()
    {
        return number_format($this->attributes['preco'], 2, ",", ".");
    }

    public function categories()
    {
        return $this->hasMany(ProductPorcaoCategory::class, 'product_porcao_id', 'id');
    }
}
