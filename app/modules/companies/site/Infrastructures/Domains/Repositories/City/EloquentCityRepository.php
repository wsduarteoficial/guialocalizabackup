<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\City;

use GuiaLocaliza\Companies\Site\Domains\Models\City\City;
use GuiaLocaliza\Companies\Site\Domains\Models\City\CityRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentCityRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\City
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentCityRepository extends BaseEloquentAbstractRepository implements CityRepository
{

    /**
     * EloquentCityRepository constructor.
     * @param City $model
     */
    public function __construct(City $model)
    {
        parent::__construct($model);
    }

    public function citiesWithCompaniesActives($abbr)
    {

        $query = $this->model->with('state', 'companies');
        $query->where('active', true);

        $query->whereHas('state', function($q) use($abbr) {
            $q->where('states.abbr', $abbr);
        });

        $query->whereHas('companies');

        return $query->paginate();

    }

}
