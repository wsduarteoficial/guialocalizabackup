<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Code;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{

    protected $connection = 'companies';

    protected $fillable = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
