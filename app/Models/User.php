<?php

namespace CodeDelivery\Models;


use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class User extends Model implements Transformable, AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use TransformableTrait, Authenticatable, Authorizable, CanResetPassword;

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cpf',
        'data_nascimento',
        'sexo',
        'email',
        'password',
        'telefone_fixo',
        'telefone_celular'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function setDataNascimentoAttributes($value)
    {
        $date = new \DateTime($value);
        $this->attributes['data_nascimento'] = $date->format('Y-m-d');
    }

    public function getDataNascimentoAttributes()
    {
        $date = new \DateTime($this->attributes['data_nascimento']);
        return $date->format('d/m/Y');
    }

    public function addresses()
    {
        return $this->hasMany(UserAddress::class, 'user_id', 'id');
    }

    public function mensagens()
    {
        return $this->hasMany(Contato::class, 'user_id', 'id');
    }

    public function cupoms()
    {
        return $this->belongsToMany(Cupom::class, 'user_cupoms', 'user_id', 'cupom_id');
    }

    public function estabelecimento()
    {
        return $this->hasOne(Estabelecimento::class, 'user_id', 'id');
    }

}
