<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CategoryPorcao extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'category_id', 'porcao_id', 'qtde'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function porcao()
    {
        return $this->belongsTo(Porcao::class, 'porcao_id', 'id');
    }
}
