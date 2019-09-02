<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent;

/**
 * Interface BaseEloquentAbstractInterface
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
interface BaseEloquentAbstractInterface
{
    /**
     * Get All Data
     * @param bool $active
     * @param bool $paginate
     * @param int $take
     * @return mixed
     */
    public function all($active=true, $paginate=false, $take=15);

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
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Where First
     * @param array $data
     * @return mixed
     */
    public function whereFirst(array $data);

}
