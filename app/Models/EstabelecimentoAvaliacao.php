<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class EstabelecimentoAvaliacao extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $fillable = [
		'estabelecimento_id',
        'client_id',
		'mensagem',
		'status',
	];

    protected $dates = ['deleted_at'];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }

    public function estabelecimento()
    {
        return $this->belongsTo(Estabelecimento::class, 'estabelecimento_id', 'id');
    }

    public function items()
    {
        return $this->belongsToMany(Avaliacao::class, 'estabelecimento_avaliacao_item', 'estabelecimento_id', 'avaliacao_id')
            ->withPivot('nota');
    }

    public function getTotalAttribute()
    {
        $total = 0;
        $itens = $this->items()->get();
        if (empty($itens))
        {
            return $total;
        }
        foreach ($itens as $item)
        {
            $total += $item->pivot->nota;
        }
        return intval($total/$itens->count());
    }

}
