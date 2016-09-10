<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Assunto extends Model implements Transformable {
	use TransformableTrait;

	protected $table = [
		'assuntos',
	];

	protected $fillable = [
		'name', 'email', 'status',
	];

	public function contatos() {
		return $this->hasMany(AssuntoContatos::class, 'assunto_id', 'id');
	}

}
