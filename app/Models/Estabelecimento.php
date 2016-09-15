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
        'cidade_id',
        'icone',
        'icone_link',
        'nome',
        'descricao',
        'email',
        'telefone',
        'status',
        'power'
    ];

    public function setIconeAttribute($value)
    {
        $this->attributes['icone'] = $value;
        $this->attributes['icone_link'] = '/public/images/estabelecimentos/' . $value;
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

    public function produtos()
    {
        return $this->hasMany(Product::class, 'estabelecimento_id', 'id');
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
