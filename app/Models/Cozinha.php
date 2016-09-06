<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Cozinha extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nome', 'status'
    ];

    protected $dates = ['deleted_at'];

    public function estabelecimentos()
    {
        return $this->belongsToMany(Estabelecimento::class, 'estabelecimento_cozinhas', 'estabelecimento_id', 'cozinha_id');
    }

}
