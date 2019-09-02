<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Category;

use GuiaLocaliza\Companies\Admin\Domains\Models\Category\Category;
use GuiaLocaliza\Companies\Admin\Domains\Models\Category\CategoryRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;


/**
 * Class EloquentCategoryRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Category
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentCategoryRepository extends BaseEloquentAbstractRepository implements CategoryRepository
{


    /**
     * EloquentCategoryRepository constructor.
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function getCategoryActiveAll()
    {
        return $this->model
                    //->where('active')
                    ->orderBy('name', 'asc')
                    ->get();
    }

    public function listAll()
    {
        return $this->model->with('subcategories')
                    ->orderBy('name', 'asc')
                    ->get();
    }

    /**
     * Verify Exists companies registered
     * @param $id
     * @return mixed
     */
    public function existsCompanies($id)
    {
        $query = $this->find($id);
        return $query->companies()->count();
    }


    /**
     * Search Auto complete
     * @param string $search
     * @return mixed
     */
    public function searchLikeSuggest($search)
    {

        $query = $this->model->select(
            'name', 'id'
        );

        $query->where('active', true);
        $query->where('name', 'like', "%" .tools_replace_like($search) ."%");

        if ($query->distinct()->exists() !== true) {
            return false;
        }

        $query->orderBy("name", "ASC");
        //$query->orderByRaw("name LIKE '{$search}%' DESC");

        return $query->distinct()->take(10)->get();

    }

    /**
     * Search Exists
     * @param array $data
     * @return array|bool
     */
    public function searchCategoryExistsReturnIds(array $data)
    {
        $query = $this->model
            ->select('id')
            ->where('active', true)
            ->where('name', 'like', "%" .tools_replace_like($search) ."%");

        if ($query->exists() === true) {

            $ids = [];
            $return =  $query->get();
            foreach ($return as $item) {
                array_push($ids, $item->id);
            }
            return $ids;
        }
        return false;

    }

}
