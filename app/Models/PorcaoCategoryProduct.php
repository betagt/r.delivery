<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PorcaoCategoryProduct extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'porcao_category_id',
		'product_id',
		'preco',
		'status',
	];

    public function porcaoCategory()
    {
        return $this->belongsTo(PorcaoCategory::class, 'porcao_category_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
