<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Modification;

use GuiaLocaliza\Companies\Admin\Domains\Models\Modification\Modification;
use GuiaLocaliza\Companies\Admin\Domains\Models\Modification\ModificationRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentModificationRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Modification
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentModificationRepository extends BaseEloquentAbstractRepository implements ModificationRepository
{

    /**
     * EloquentModificationRepository constructor.
     * @param Modification $model
     */
    public function __construct(Modification $model)
    {
        parent::__construct($model);
    }

}
