<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Plano extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

}
