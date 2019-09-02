<?php

namespace GuiaLocaliza\Companies\Site\Domains\Models\City;

use GuiaLocaliza\Companies\Site\Domains\Models\State\State;
use GuiaLocaliza\Companies\Site\Domains\Models\Company\Company;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $connection = 'companies';

    protected $fillable = ['name'];

    public function state()
    {
        return $this->belongsTo(State::class)->select(['id', 'name', 'abbr']);
    }

    public function companies()
    {
        return $this->belongsTo(Company::class, 'id', 'city_id');
        
    }

}
