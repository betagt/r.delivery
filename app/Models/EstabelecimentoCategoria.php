<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class EstabelecimentoCategoria extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'titulo', 'slug','icon', 'status'
    ];

    public function setTituloAttributes($value)
    {
        $this->attributes['titulo'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
    public function getIconAttribute()
    {
        $value = $this->attributes['icon'];
        if (mb_ereg("^http", $value))
        {
            return $value;
        }
        return 'http://'.$_SERVER['HTTP_HOST'].'/images/categoria_estabelecimentos/' . $this->attributes['icon'];
    }
    public function estabelecimentos()
    {
        return $this->hasMany(Estabelecimento::class, 'estabelecimento_categoria_id', 'id');
    }

}
