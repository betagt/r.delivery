<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Category extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;
    
    protected $fillable = [
        'parent_id', 'name', 'tipo'
    ];

    protected $dates = ['deleted_at'];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    public function parent()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function porcoes()
    {
        return $this->hasMany(PorcaoCategory::class, 'category_id', 'id');
    }
}
