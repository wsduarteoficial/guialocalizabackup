<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Audit;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{

    protected $connection = 'companies';

    protected $fillable = [];

    
    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
