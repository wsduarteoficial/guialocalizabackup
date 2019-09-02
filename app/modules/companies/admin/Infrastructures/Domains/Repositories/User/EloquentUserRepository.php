<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\User;

use GuiaLocaliza\Companies\Admin\Domains\Models\User\User;
use GuiaLocaliza\Companies\Admin\Domains\Models\User\UserRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentUserRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\User
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentUserRepository extends BaseEloquentAbstractRepository implements UserRepository
{

    /**
     * EloquentUserRepository constructor.
     * @param User $model
     * @throws \Exception
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * Exists User Registered
     * @param array $data
     * @return mixed
     */
    public function existUserRegistered(array $data)
    {

        return $this->model
                ->where('email', $data['email'])
                ->where('id', '!=', $data['id'])
                ->exists();

    }

}
