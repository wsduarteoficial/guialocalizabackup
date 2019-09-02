<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Plan;

use GuiaLocaliza\Companies\Admin\Domains\Models\Plan\Plan;
use GuiaLocaliza\Companies\Admin\Domains\Models\Plan\PlanRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentPlanRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Plan
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

    public function getPlansActiveAll()
    {
        return $this->model
                    ->where('active', true)
                    ->get();
    }

}
