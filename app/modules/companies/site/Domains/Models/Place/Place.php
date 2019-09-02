<?php

namespace GuiaLocaliza\Companies\Site\Domains\Models\Place;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{

    protected $connection = 'companies';

    protected $fillable = [
        'id',
        'city_id',
        'code',
        'active'
    ];

}
