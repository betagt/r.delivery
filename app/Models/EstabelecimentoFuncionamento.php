<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class EstabelecimentoFuncionamento extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $table = 'estabelecimentos_funcionamentos';

    protected $fillable = [
        'estabelecimento_id',
        'dia_funcionamento',
        'horario_funcionamento',
    ];

    protected $dates = ['deleted_at'];

    public function estabelecimento()
    {
        return $this->belongsTo(Estabelecimento::class, 'estabelecimento_id', 'id');
    }

}
