<?php

namespace GuiaLocaliza\Companies\Api\v1\Infrastructures\Persistences;

/**
 * Class EloquentBaseEloquentAbstractRepository
 * @package GuiaLocaliza\Companies\Api\v1\Infrastructures\Persistences
 */
abstract class EloquentBaseEloquentAbstractRepository implements EloquentRepositoryInterface
{

    /**
     * @var
     */
    protected $model;

    /**
     * Get All Data
     * @param bool $active
     * @param bool $paginate
     * @param int $take
     * @return mixed
     */
    public function getAll($active=false, $paginate=false, $take=15)
    {

        $query = $this->model;

        if ($active) {
            $query->where('active', $active);
        }
       
        if ($paginate) {
            return $query->paginate($take);
        }

        if (is_int($take)) {
            $query->take($take);
        }

        return $query->get();

    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
    
}
