<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Place;

use GuiaLocaliza\Companies\Site\Domains\Models\Place\Place;
use GuiaLocaliza\Companies\Site\Domains\Models\Place\PlaceRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentPlaceRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Place
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

}
