<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class EstabelecimentoEntrega extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $table = "estabelecimentos_entregas";

    protected $fillable = [
		'estabelecimento_id',
		'tempo_entrega',
		'faixa_preco',
		'tipo_pagamento',
		'tipo_entrega',
	];

    protected $dates = ['deleted_at'];

    public function estabelecimento()
    {
        return $this->belongsTo(Estabelecimento::class, 'estabelecimento_id', 'id');
    }

}
