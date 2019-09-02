<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Rating;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    protected $connection = 'companies';

    protected $fillable = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
