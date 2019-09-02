<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Log;

use GuiaLocaliza\Companies\Site\Domains\Models\Log\LogActivity;
use GuiaLocaliza\Companies\Site\Domains\Models\Log\LogActivityRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentLogActivityRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Log
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentLogActivityRepository extends BaseEloquentAbstractRepository  implements LogActivityRepository
{

    /**
     * EloquentLogActivityRepository constructor.
     * @param LogActivity $model
     */
    public function __construct(LogActivity $model)
    {
        parent::__construct($model);
    }

}
