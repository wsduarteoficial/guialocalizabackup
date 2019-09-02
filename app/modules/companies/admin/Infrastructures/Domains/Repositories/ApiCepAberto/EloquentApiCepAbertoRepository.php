<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\ApiCepAberto;

use GuiaLocaliza\Companies\Admin\Domains\Models\ApiCepAberto\ApiCepAberto;
use GuiaLocaliza\Companies\Admin\Domains\Models\ApiCepAberto\ApiCepAbertoRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentApiCepAbertoRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\ApiCepAberto
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentApiCepAbertoRepository extends BaseEloquentAbstractRepository implements ApiCepAbertoRepository
{

    /**
     * EloquentApiCepAbertoRepository constructor.
     * @param ApiCepAberto $model
     */
    public function __construct(ApiCepAberto $model)
    {
        parent::__construct($model);
    }

    public function getAddressFull($number)
    {
        $query = $this->model->with('state', 'city');
        return $query->where('cep', $number)->get()->first();
    }

}
