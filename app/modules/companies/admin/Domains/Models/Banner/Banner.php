<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Banner;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{

    protected $connection = 'companies';

    protected $fillable = [
    	'company_id',
		'position_search',
		'image',
		'ext',
		'size'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
