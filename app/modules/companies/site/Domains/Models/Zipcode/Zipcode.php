<?php

namespace GuiaLocaliza\Companies\Site\Domains\Models\Zipcode;

use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model
{

    protected $connection = 'companies';

    protected $fillable = [
        'id',
        'city_id',
        'code',
        'active'
    ];

}
