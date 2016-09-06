<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Avaliacao extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $table = 'avaliacoes';

    protected $fillable = [
		'questao',
		'status',
	];

    protected $dates = ['deleted_at'];

    public function items()
    {
        return $this->belongsToMany(Avaliacao::class, 'order_avaliacao_item', 'avaliacao_id', 'order_avaliacao_id')
            ->withPivot('nota');
    }
}
