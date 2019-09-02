<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Modification;

use GuiaLocaliza\Companies\Site\Domains\Models\Modification\Modification;
use GuiaLocaliza\Companies\Site\Domains\Models\Modification\ModificationRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentModificationRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Modification
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
