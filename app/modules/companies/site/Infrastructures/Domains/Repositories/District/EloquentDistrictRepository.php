<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\District;

use GuiaLocaliza\Companies\Site\Domains\Models\District\District;
use GuiaLocaliza\Companies\Site\Domains\Models\District\DistrictRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentDistrictRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\District
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentDistrictRepository extends BaseEloquentAbstractRepository implements DistrictRepository
{

    /**
     * EloquentDistrictRepository constructor.
     * @param District $model
     */
    public function __construct(District $model)
    {
        parent::__construct($model);
    }

}
