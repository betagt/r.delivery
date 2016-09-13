<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProductExtraItem extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'product_extra_items';

    protected $fillable = [
		'product_extra_id',
		'name',
		'price',
        'status',
	];

    public function extra()
    {
        return $this->belongsTo(ProductExtra::class, 'product_extra_id', 'id');
    }

}
