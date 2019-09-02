<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\State;

use GuiaLocaliza\Companies\Site\Domains\Models\State\State;
use GuiaLocaliza\Companies\Site\Domains\Models\State\StateRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentStateRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\State
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentStateRepository extends BaseEloquentAbstractRepository implements StateRepository
{

    /**
     * EloquentBaseStateRepository constructor.
     * @param State $model
     */
    public function __construct(State $model)
    {
        parent::__construct($model);
    }

    /**
     * @return mixed
     */
    public function stateActive()
    {
        return $this->model->with('cities')
            ->where(['active' => true])->get();
    }

}
