<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\SolicitationRegister;

use Illuminate\Database\Eloquent\Model;

class SolicitationRegister extends Model
{

    protected $connection = 'companies';

    protected $fillable = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
