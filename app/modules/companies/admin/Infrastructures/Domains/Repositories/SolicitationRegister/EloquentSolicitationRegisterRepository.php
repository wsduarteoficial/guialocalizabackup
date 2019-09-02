<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\SolicitationRegister;

use GuiaLocaliza\Companies\Admin\Domains\Models\SolicitationRegister\SolicitationRegister;
use GuiaLocaliza\Companies\Admin\Domains\Models\SolicitationRegister\SolicitationRegisterRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentSolicitationRegisterRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\SolicitationRegister
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentSolicitationRegisterRepository extends BaseEloquentAbstractRepository implements SolicitationRegisterRepository
{

    /**
     * EloquentSolicitationRegisterRepository constructor.
     * @param SolicitationRegister $model
     */
    public function __construct(SolicitationRegister $model)
    {
        parent::__construct($model);
    }

}
