<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseEloquentAbstractRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
abstract class BaseEloquentAbstractRepository implements BaseEloquentAbstractInterface
{

    /**
     * @var
     */
    protected $model;

    /**
     * BaseEloquentAbstractRepository constructor.
     * @param $model
     * @throws \Exception
     */
    public function __construct($model)
    {

        if (($model instanceof Model) === false)
            throw new \Exception("Model is invalid");
        $this->model = $model;

    }

    /**
     * Get All Data
     * @param bool $active
     * @param bool $paginate
     * @param int $take
     * @return mixed
     */
    public function all($active=false, $paginate=false, $take=15)
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
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
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

    /**
     * @param string $active
     * @return mixed
     */
    public function count($active='')
    {
        $query = $this->model;

        if ($active === true || $active === false) {
            return $query->where('active', $active)->count();
        }

        return $query->count();

    }

    /**
     * Exists id
     * @return mixed
     */
    public function exists($id='')
    {
        return $this->model->find($id)->exists();
    }

    /**
     * Where First
     * @param array $data
     * @return mixed
     */
    public function whereFirst(array $data)
    {
        return $this->model->where($data)->get()->first();
    }

    /**
     * Exists Fields and values
     * @param array $data
     * @return mixed
     */
    public function whereExists(array $data)
    {
        return $this->model->where($data)->exists();
    }

}
