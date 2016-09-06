<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class EstabelecimentoEndereco extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $table = "estabelecimentos_enderecos";

    protected $fillable = [
        'estabelecimento_id',
        'endereco',
        'complemento',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'latitude',
        'longitude',
    ];

    protected $dates = ['deleted_at'];

    public function estabelecimento()
    {
        return $this->belongsTo(Estabelecimento::class, 'estabalecimento_id', 'id');
    }

}
