<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Plan;

use GuiaLocaliza\Companies\Site\Domains\Models\Plan\Plan;
use GuiaLocaliza\Companies\Site\Domains\Models\Plan\PlanRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentPlanRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Plan
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentPlanRepository extends BaseEloquentAbstractRepository implements PlanRepository
{

    /**
     * EloquentPlanRepository constructor.
     * @param Plan $model
     */
    public function __construct(Plan $model)
    {
        parent::__construct($model);
    }

}
