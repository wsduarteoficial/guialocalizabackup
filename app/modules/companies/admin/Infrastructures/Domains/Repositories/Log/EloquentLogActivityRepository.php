<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Log;

use GuiaLocaliza\Companies\Admin\Domains\Models\Log\LogActivity;
use GuiaLocaliza\Companies\Admin\Domains\Models\Log\LogActivityRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentLogActivityRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Log
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
