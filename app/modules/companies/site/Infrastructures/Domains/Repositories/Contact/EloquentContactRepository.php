<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Contact;

use GuiaLocaliza\Companies\Site\Domains\Models\Contact\Contact;
use GuiaLocaliza\Companies\Site\Domains\Models\Contact\ContactRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentContactRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Contact
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentContactRepository extends BaseEloquentAbstractRepository implements ContactRepository
{

    /**
     * EloquentContactRepository constructor.
     * @param Contact $model
     */
    public function __construct(Contact $model)
    {
        parent::__construct($model);
    }

}
