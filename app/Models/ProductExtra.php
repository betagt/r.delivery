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
        'tipo',
		'status',
	];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function extra()
    {
        return $this->belongsTo(CategoryExtra::class, 'category_extra_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(ProductExtraItem::class, 'product_extra_id', 'id');
    }
}
