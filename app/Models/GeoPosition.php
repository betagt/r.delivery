<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class GeoPosition extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['lat_log_origens','lat_log_destinos','price'];

}
