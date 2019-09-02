<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Zipcode;

use GuiaLocaliza\Companies\Admin\Domains\Models\Zipcode\Zipcode;
use GuiaLocaliza\Companies\Admin\Domains\Models\Zipcode\ZipcodeRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentZipcodeRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Zipcode
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentZipcodeRepository extends BaseEloquentAbstractRepository implements ZipcodeRepository
{

    /**
     * EloquentZipcodeRepository constructor.
     * @param Zipcode $model
     */
    public function __construct(Zipcode $model)
    {
        parent::__construct($model);
    }

    /**
     * List All per Id City
     * @param $id
     * @return mixed
     */
    public function listAll($id)
    {
        return $this->model
            ->where('city_id', $id)
            ->distinct()
            ->get();

    }

    public function isExists(array $array)
    {
        
        return $this->model->where('code', $array['code']) 
                    ->where('city_id', $array['city_id'])
                    ->where('id', '!=', $array['zipcode_id'])
                    ->exists();
           

    }
}
