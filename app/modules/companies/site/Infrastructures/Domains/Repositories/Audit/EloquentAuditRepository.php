<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Audit;

use GuiaLocaliza\Companies\Site\Domains\Models\Audit\Audit;
use GuiaLocaliza\Companies\Site\Domains\Models\Audit\AuditRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentAuditRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Audit
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
