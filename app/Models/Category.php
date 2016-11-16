<?php

namespace CodeDelivery\Models;

use Doctrine\DBAL\Driver\PDOException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Category extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $fillable = [
        'estabelecimento_id', 'parent_id', 'name', 'tipo', 'multi', 'status'
    ];

    protected $dates = ['deleted_at'];

    public function estabelecimento()
    {
        return $this->belongsTo(Estabelecimento::class, 'estabelecimento_id', 'id');
    }

    public function getParentIdAttributes()
    {
        return $this->attributes['parent_id'] = 0 ? $this->attributes['id'] : $this->attributes['parent_id'];
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        if ($this->parent_id == 0) {
            $this->parent_id = $this->id;
        }
        return $this->belongsTo(CategoryParent::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function porcoes()
    {
        return $this->hasMany(CategoryPorcao::class, 'category_id', 'id');
    }
}
