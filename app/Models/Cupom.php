<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Cupom extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $fillable = [
        'code',
        'value',
    ];

    protected $dates = ['deleted_at'];

    public function order()
    {
        return $this->hasOne(Order::class, 'cupom_id', 'id');
    }

    public function setValueAttribute($value)
    {
        $this->attributes['value'] = str_replace(',','.', preg_replace('#[^\d\,]#is','',$value));
    }

    public function getValueAttribute()
    {
        return number_format($this->attributes['value'], 2, ",", ".");
    }


}
