<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Click;

use GuiaLocaliza\Companies\Site\Domains\Models\Click\Click;
use GuiaLocaliza\Companies\Site\Domains\Models\Click\ClickRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentClickRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Click
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentClickRepository extends BaseEloquentAbstractRepository implements ClickRepository
{

    /**
     * EloquentClickRepository constructor.
     * @param Click $model
     */
    public function __construct(Click $model)
    {
        parent::__construct($model);
    }

}
