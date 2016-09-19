<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PorcaoCategory extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
		'category_id',
		'qtde_items_comportados',
		'status',
	];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
