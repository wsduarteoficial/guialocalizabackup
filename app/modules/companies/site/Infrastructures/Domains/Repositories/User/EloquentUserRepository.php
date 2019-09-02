<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\User;

use GuiaLocaliza\Companies\Site\Domains\Models\User\User;
use GuiaLocaliza\Companies\Site\Domains\Models\User\UserRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentUserRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\User
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentUserRepository extends BaseEloquentAbstractRepository implements UserRepository
{

    /**
     * EloquentUserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

}
