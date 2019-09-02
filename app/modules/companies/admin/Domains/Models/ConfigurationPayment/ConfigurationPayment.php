<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\ConfigurationPayment;

use Illuminate\Database\Eloquent\Model;

class ConfigurationPayment extends Model
{

    protected $connection = 'companies';

    protected $fillable = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
