<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class AssuntoContatos extends Model implements Transformable {
	use TransformableTrait;

	protected $table = ['assunto_contatos'];

	protected $fillable = [
		'assunto_id', 'user_id', 'message', 'response', 'status',
	];

	public function assunto() {
		return $this->belongsTo(Assunto::class, 'assunto_id', 'id');
	}

}
