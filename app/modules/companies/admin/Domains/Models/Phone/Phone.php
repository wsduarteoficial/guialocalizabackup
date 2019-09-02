<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Phone;

use GuiaLocaliza\Companies\Admin\Domains\Models\Company\Company;
use GuiaLocaliza\Companies\Admin\Domains\Models\State\State;
use GuiaLocaliza\Companies\Admin\Domains\Models\City\City;
use GuiaLocaliza\Companies\Admin\Domains\Models\Plan\Plan;
use GuiaLocaliza\Companies\Admin\Domains\Models\Phone\Phone;
use Illuminate\Database\Eloquent\Model;
use DB;

class Phone extends Model
{

    protected $connection = 'companies';

    protected $fillable = [
        'code',
        'type',
        'number'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function companies()
    {
        return $this->belongsToMany(Company::class)
                    ->select([
                      'name_fantasy',
                      'state_id',
                      'city_id'
                    ]);
    }

    public function stateAndCity($state_id='',$city_id='')
    {

        if($state_id>0 && $city_id>0) {
          $res=DB::table('cities')
            ->select(['cities.name', 'states.abbr'])
            ->join('states', function ($join) use ($city_id) {
                $join->on('cities.state_id', '=', 'states.id')
                     ->where('cities.id', '=', $city_id);
            })
            ->first();

            return sprintf('%s/%s', $res->name, $res->abbr);
        }

        return '--';
    }

}
