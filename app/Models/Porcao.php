<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Porcao extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nome', 'qtde', 'status'
    ];

    public function produtos()
    {
        return $this->hasMany(ProductPorcao::class, 'porcao_id', 'id');
    }

}
