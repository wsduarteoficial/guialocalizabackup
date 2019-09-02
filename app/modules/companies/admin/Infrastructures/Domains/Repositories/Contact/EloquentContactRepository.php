<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Contact;

use GuiaLocaliza\Companies\Admin\Domains\Models\Contact\Contact;
use GuiaLocaliza\Companies\Admin\Domains\Models\Contact\ContactRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentContactRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Contact
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
