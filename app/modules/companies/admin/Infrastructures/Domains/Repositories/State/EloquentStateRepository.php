<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\State;

use GuiaLocaliza\Companies\Admin\Domains\Models\State\State;
use GuiaLocaliza\Companies\Admin\Domains\Models\State\StateRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentStateRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\State
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
        return $this->model->where(['active' => true])
                ->orderBy('name', 'asc')
                ->get();        
    }

    public function listAll()
    {
        return $this->model
            ->orderBy('name', 'asc')
            ->get();
    }

}
