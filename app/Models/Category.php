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
        'name'
    ];

    protected $dates = ['deleted_at'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function porcoes()
    {
        return $this->hasMany(PorcaoCategory::class, 'category_id', 'id');
    }
}
