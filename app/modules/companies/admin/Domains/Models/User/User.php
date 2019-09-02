<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{

    use Notifiable;

    protected $connection = 'companies';

    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
        'admin',
        'remember_token'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

}
