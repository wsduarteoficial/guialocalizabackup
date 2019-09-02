<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\City;

use GuiaLocaliza\Companies\Admin\Domains\Models\City\City;
use GuiaLocaliza\Companies\Admin\Domains\Models\City\CityRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentCityRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\City
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

    /**
     * @param string $id
     * @return mixed
     */
    public function getCityActivePerStateId($id='')
    {
    	return $this->model
                    ->where('active', true)
    				->where('state_id', $id)
    				->orderBy('name', 'asc')
    				->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function listAll($id)
    {
        return $this->model->with('state')
            ->where('state_id', $id)
            ->get();

    }

    /**
     * Update Cities via States
     * @param $state_id
     */
    public function activeAll($state_id, $active)
    {

        $this->model->where('state_id', $state_id)
            //->where('active', 0);
            ->update(['active' => $active]);

    }

    public function findCityWithState($id='')
    {

        return $this->model
                   ->with('state')
                   ->find($id);
    }

}
