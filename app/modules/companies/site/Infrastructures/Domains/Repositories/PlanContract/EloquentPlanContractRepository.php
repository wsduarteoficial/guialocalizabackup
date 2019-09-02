<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\PlanContract;

use GuiaLocaliza\Companies\Site\Domains\Models\PlanContract\PlanContract;
use GuiaLocaliza\Companies\Site\Domains\Models\PlanContract\PlanContractRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentPlanContractRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\PlanContract
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentPlanContractRepository extends BaseEloquentAbstractRepository implements PlanContractRepository
{

    /**
     * EloquentPlanContractRepository constructor.
     * @param PlanContract $model
     */
    public function __construct(PlanContract $model)
    {
        parent::__construct($model);
    }

}
