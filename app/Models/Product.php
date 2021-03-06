<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $fillable = [
        'category_id',
        'parent_id',
        'name',
        'description',
        'price',
    ];

    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = str_replace(',','.', preg_replace('#[^\d\,]#is','',$value));
    }

    public function getPriceAttribute()
    {
        return number_format($this->attributes['price'], 2, ",", ".");
    }

    public function porcoes()
    {
        return $this->hasMany(ProductPorcao::class, 'product_id', 'id');
    }
}
