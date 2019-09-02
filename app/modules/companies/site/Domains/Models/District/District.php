<?php

namespace GuiaLocaliza\Companies\Site\Domains\Models\District;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    protected $connection = 'companies';

    protected $fillable = [
        'id',
        'city_id',
        'code',
        'active'
    ];

}
