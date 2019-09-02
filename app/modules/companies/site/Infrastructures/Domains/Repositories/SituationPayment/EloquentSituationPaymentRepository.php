<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\SituationPayment;

use GuiaLocaliza\Companies\Site\Domains\Models\SituationPayment\SituationPayment;
use GuiaLocaliza\Companies\Site\Domains\Models\SituationPayment\SituationPaymentRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentSituationPaymentRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\SituationPayment
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
