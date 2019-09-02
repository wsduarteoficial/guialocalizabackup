<?php

namespace GuiaLocaliza\Companies\Site\Domains\Models\Log;

use Illuminate\Database\Eloquent\Model;

class LogSearch extends Model
{

	protected $connection = 'companies';
	
    protected $fillable = [
        'tag_search',
        'total',
        'url',
        'method',
        'ip',
        'agent',
        'state_id',
        'city_id',
        'category_id',
        'subcategory_id',
    ];

}
