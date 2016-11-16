<?php

namespace CodeDelivery\Models;

use Doctrine\DBAL\Driver\PDOException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CategoryParent extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'estabelecimento_id', 'parent_id', 'name', 'tipo', 'multi', 'status'
    ];

    protected $dates = ['deleted_at'];

    public function category()
    {
        if ($this->parent_id == 0) {
            $this->parent_id = $this->id;
        }
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
}
