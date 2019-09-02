<?php

namespace GuiaLocaliza\Companies\Site\Domains\Models\User;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $connection = 'companies';

    protected $fillable = [
        'name',
        'email',
        'admin',
        'password',
        'active',
        'remember_token'
    ];

}
