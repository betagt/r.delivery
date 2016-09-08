<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProductExtra extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'product_extras';

    protected $fillable = [
		'product_id',
		'category_extra_id',
		'price',
		'status',
	];

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = str_replace(',','.', preg_replace('#[^\d\,]#is','',$value));
    }

    public function getPriceAttribute()
    {
        return number_format($this->attributes['price'], 2, ",", ".");
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function extra()
    {
        return $this->belongsTo(CategoryExtra::class, 'category_extra_id');
    }
}
