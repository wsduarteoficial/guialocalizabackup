<?php

namespace GuiaLocaliza\Companies\Site\Domains\Models\Phone;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{

    protected $connection = 'companies';

    protected $fillable = [
        'code',
        'type',
        'number'
    ];

}
