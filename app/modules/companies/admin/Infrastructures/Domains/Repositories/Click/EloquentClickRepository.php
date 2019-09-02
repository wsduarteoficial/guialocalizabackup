<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Click;

use GuiaLocaliza\Companies\Admin\Domains\Models\Click\Click;
use GuiaLocaliza\Companies\Admin\Domains\Models\Click\ClickRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentClickRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Click
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
