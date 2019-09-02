<?php

namespace GuiaLocaliza\Companies\Api\v1\Infrastructures\Domains\User;

use GuiaLocaliza\Companies\Api\v1\Domains\Models\User\User;
use GuiaLocaliza\Companies\Api\v1\Domains\Models\User\UserRepository;
use GuiaLocaliza\Companies\Api\v1\Infrastructures\Persistences\EloquentBaseEloquentAbstractRepository;

/**
 * Class EloquentUserRepository
 * @package GuiaLocaliza\Companies\Api\v1\Infrastructures\Domains\User
 */
class EloquentUserRepository extends BaseRepository implements UserRepository
{

    /**
     * EloquentUserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

}
