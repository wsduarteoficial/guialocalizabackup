<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Code;

use GuiaLocaliza\Companies\Admin\Domains\Models\Code\Code;
use GuiaLocaliza\Companies\Admin\Domains\Models\Code\CodeRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentCodeRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Code
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentCodeRepository extends BaseEloquentAbstractRepository implements CodeRepository
{

    /**
     * EloquentCodeRepository constructor.
     * @param Code $model
     */
    public function __construct(Code $model)
    {
        parent::__construct($model);
    }

}
