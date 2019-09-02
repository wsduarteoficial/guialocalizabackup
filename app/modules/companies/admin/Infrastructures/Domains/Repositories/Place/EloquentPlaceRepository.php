<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Place;

use GuiaLocaliza\Companies\Admin\Domains\Models\Place\Place;
use GuiaLocaliza\Companies\Admin\Domains\Models\Place\PlaceRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentPlaceRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Place
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentPlaceRepository extends BaseEloquentAbstractRepository implements PlaceRepository
{

    /**
     * EloquentPlaceRepository constructor.
     * @param Place $model
     */
    public function __construct(Place $model)
    {
        parent::__construct($model);
    }

    /**
     * List All per Id City
     * @param $id
     * @return mixed
     */
    public function listAll($id)
    {
        return $this->model
            ->where('city_id', $id)
            ->distinct()
            ->get();

    }

    /**
     * @param array $data
     * @return mixed
     */
    public function filterQueryPerLikeAndCityAll(array $data)
    {

        $query = $this->model;
        $active = isset( $data['active'] ) && $data['active']  === 'false' ? false : true;

        if ($active) {
            $query->where('active', $active);
        }

        return $query->where('city_id', '=', $data['city_id'])
                    ->where('name', 'LIKE', '%'. $data['query'] . '%')
                    ->get();


    }

    public function isExists(array $array)
    {
        
        return $this->model->where('name', $array['name']) 
                    ->where('city_id', $array['city_id'])
                    ->where('id', '!=', $array['place_id'])
                    ->exists();
           

    }

}
