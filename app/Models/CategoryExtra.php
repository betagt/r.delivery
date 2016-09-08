<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CategoryExtra extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'category_extras';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'category_id', 'name', 'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(ProductExtra::class, 'product_id', 'id');
    }
}
