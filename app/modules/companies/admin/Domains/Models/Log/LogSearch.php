<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Log;

use GuiaLocaliza\Companies\Admin\Domains\Models\City\City;
use GuiaLocaliza\Companies\Admin\Domains\Models\State\State;
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

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

}
