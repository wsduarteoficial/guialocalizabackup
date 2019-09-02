<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Audit;

use GuiaLocaliza\Companies\Admin\Domains\Models\Audit\Audit;
use GuiaLocaliza\Companies\Admin\Domains\Models\Audit\AuditRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentAuditRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Audit
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentAuditRepository extends BaseEloquentAbstractRepository implements AuditRepository
{

    /**
     * EloquentAuditRepository constructor.
     * @param Audit $model
     */
    public function __construct(Audit $model)
    {
        parent::__construct($model);
    }

}
