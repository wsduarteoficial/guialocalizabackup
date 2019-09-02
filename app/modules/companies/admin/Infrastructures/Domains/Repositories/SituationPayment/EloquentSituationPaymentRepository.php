<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\SituationPayment;

use GuiaLocaliza\Companies\Admin\Domains\Models\SituationPayment\SituationPayment;
use GuiaLocaliza\Companies\Admin\Domains\Models\SituationPayment\SituationPaymentRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentSituationPaymentRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\SituationPayment
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentSituationPaymentRepository extends BaseEloquentAbstractRepository implements SituationPaymentRepository
{

    /**
     * EloquentSituationPaymentRepository constructor.
     * @param SituationPayment $model
     */
    public function __construct(SituationPayment $model)
    {
        parent::__construct($model);
    }

}
