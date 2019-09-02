<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Code;

use GuiaLocaliza\Companies\Site\Domains\Models\Code\Code;
use GuiaLocaliza\Companies\Site\Domains\Models\Code\CodeRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentCodeRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Code
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
