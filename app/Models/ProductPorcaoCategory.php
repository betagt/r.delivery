<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProductPorcaoCategory extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'product_id', 'porcao_id', 'category_id', 'qtde'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function porcao()
    {
        return $this->belongsTo(Porcao::class, 'porcao_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
