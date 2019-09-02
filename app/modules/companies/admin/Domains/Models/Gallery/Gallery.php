<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Gallery;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{

    protected $connection = 'companies';

    protected $fillable = [
    	'company_id',
		'image',
		'ext',
		'size'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
