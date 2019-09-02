<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Plan;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{

    protected $connection = 'companies';

    protected $fillable = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
