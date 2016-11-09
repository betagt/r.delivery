<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Estabelecimento extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $table = 'estabelecimentos';

    protected $fillable = [
        'estabelecimento_categoria_id',
        'cidade_id',
        'icone',
        'nome',
        'descricao',
        'email',
        'telefone',
        'status',
        'power'
    ];

    public function getIconeAttribute()
    {
        $value = $this->attributes['icone'];
        if (mb_ereg("^http", $value))
        {
            return $value;
        }
        return 'http://'.$_SERVER['HTTP_HOST'].'/images/estabelecimentos/' . $this->attributes['icone'];
    }

    protected $dates = ['deleted_at'];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cidade_id', 'id');
    }

    public function endereco()
    {
        return $this->hasOne(EstabelecimentoEndereco::class, 'estabelecimento_id', 'id');
    }

    public function entrega()
    {
        return $this->hasOne(EstabelecimentoEntrega::class, 'estabelecimento_id', 'id');
    }

    public function funcionamentos()
    {
        return $this->hasMany(EstabelecimentoFuncionamento::class, 'estabelecimento_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'estabelecimento_id', 'id');
    }

    public function estabelecimentoCategoria()
    {
        return $this->belongsTo(EstabelecimentoCategoria::class, 'estabelecimento_categoria_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'estabelecimento_id', 'id');
    }

    public function cozinhas()
    {
        return $this->belongsToMany(Cozinha::class, 'estabelecimento_cozinhas', 'estabelecimento_id', 'cozinha_id');
    }
}
