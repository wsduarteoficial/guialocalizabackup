<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Zipcode;

use GuiaLocaliza\Companies\Site\Domains\Models\Zipcode\Zipcode;
use GuiaLocaliza\Companies\Site\Domains\Models\Zipcode\ZipcodeRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentZipcodeRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Zipcode
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

}
