<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OrderAvaliacao extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $table = "orders_avaliacoes";

    protected $fillable = [
		'order_id',
		'mensagem',
		'status',
	];

    protected $dates = ['deleted_at'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function items()
    {
        return $this->belongsToMany(Avaliacao::class, 'order_avaliacao_item', 'order_avaliacao_id', 'avaliacao_id')
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
