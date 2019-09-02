<?php

namespace GuiaLocaliza\Companies\Api\v1\Infrastructures\Persistences;

/**
 * Interface EloquentRepositoryInterface
 * @package Loojas\Core\Repositories\Contracts
 */
interface EloquentRepositoryInterface
{
    /**
     * Get All Data
     * @param bool $active
     * @param bool $paginate
     * @param int $take
     * @return mixed
     */
    public function getAll($active=true, $paginate=false, $take=15);

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

}
