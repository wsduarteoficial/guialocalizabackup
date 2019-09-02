<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Phone;

use GuiaLocaliza\Companies\Site\Domains\Models\Phone\Phone;
use GuiaLocaliza\Companies\Site\Domains\Models\Phone\PhoneRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentPhoneRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Phone
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentPhoneRepository extends BaseEloquentAbstractRepository implements PhoneRepository
{

    /**
     * EloquentPhoneRepository constructor.
     * @param Phone $model
     */
    public function __construct(Phone $model)
    {
        parent::__construct($model);
    }

}
