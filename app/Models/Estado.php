<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Estado extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'uf', 'nome', 'status'
    ];

    public function cidades()
    {
        return $this->hasMany(Cidade::class, 'estado_id', 'id');
    }

}
