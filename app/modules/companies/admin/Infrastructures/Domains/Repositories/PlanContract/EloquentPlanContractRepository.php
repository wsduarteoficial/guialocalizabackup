<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\PlanContract;

use GuiaLocaliza\Companies\Admin\Domains\Models\PlanContract\PlanContract;
use GuiaLocaliza\Companies\Admin\Domains\Models\PlanContract\PlanContractRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentPlanContractRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\PlanContract
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

    public function findContractPerIdCompany($id)
    {

        $query = $this->model;
        $query = $query->with('client');
        $query = $query->where('company_id', (int) $id);        
        return $query->first();
        
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateContract(array $data, $id)
    {
        return $this->model->where('company_id', '=', $id)->update($data);
    }

}
