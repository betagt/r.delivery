<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Contato extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'user_id',
		'assunto',
		'mensagem',
		'status',
	];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
