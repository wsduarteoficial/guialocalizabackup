<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Tag;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $connection = 'companies';

    protected $fillable = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
