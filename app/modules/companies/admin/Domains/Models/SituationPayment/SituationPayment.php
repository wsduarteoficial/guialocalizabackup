<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\SituationPayment;

use Illuminate\Database\Eloquent\Model;

class SituationPayment extends Model
{

    protected $connection = 'companies';

    protected $fillable = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
