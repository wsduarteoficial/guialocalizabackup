<?php

namespace GuiaLocaliza\Companies\Site\Domains\Models\BannerReport;

use Illuminate\Database\Eloquent\Model;

class BannerReport extends Model
{

    protected $connection = 'companies';

    protected $fillable = [

    	'banner_id',
    	'company_id',
        'state_id',
        'city_id',
    	'action',
    	'url_referer',
    	'tags',
    	'ip',
    	'agent',
    	
    ];

}
