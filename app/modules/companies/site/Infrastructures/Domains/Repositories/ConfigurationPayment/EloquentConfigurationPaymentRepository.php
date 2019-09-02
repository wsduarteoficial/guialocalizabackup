<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\ConfigurationPayment;

use GuiaLocaliza\Companies\Site\Domains\Models\ConfigurationPayment\ConfigurationPayment;
use GuiaLocaliza\Companies\Site\Domains\Models\ConfigurationPayment\ConfigurationPaymentRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentConfigurationPaymentRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\ConfigurationPayment
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentConfigurationPaymentRepository extends BaseEloquentAbstractRepository implements ConfigurationPaymentRepository
{

    /**
     * EloquentConfigurationPaymentRepository constructor.
     * @param ConfigurationPayment $model
     */
    public function __construct(ConfigurationPayment $model)
    {
        parent::__construct($model);
    }

}
