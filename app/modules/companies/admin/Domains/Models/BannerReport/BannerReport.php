<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\BannerReport;

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


  protected $dates = [
    'created_at',
    'updated_at',
  ];

}
