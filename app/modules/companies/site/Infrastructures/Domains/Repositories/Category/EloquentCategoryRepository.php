<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Category;

use GuiaLocaliza\Companies\Site\Domains\Models\Category\Category;
use GuiaLocaliza\Companies\Site\Domains\Models\Category\CategoryRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;
use Illuminate\Support\Facades\Cache;

/**
 * Class EloquentCategoryRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Category
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

    /**
     * @var int
     */
    private $minuteCacheSuggest = 60*24;


    /**
     * Search Auto complete
     * @param array $data
     * @return mixed
     */
    public function searchLikeSuggest(array $data)
    {

        $tag = $data['search']. __FUNCTION__;

        $category = Cache::remember($tag , $this->minuteCacheSuggest, function () use($data) {

            $query = $this->model->select(
                'name'
            );

            $query->where('active', true);
            $query->where('name', 'like', "%" .tools_replace_like($data['search']) ."%");

            if ($query->distinct()->exists() !== true) {
                return false;
            }

            $query->orderByRaw("name = '{$data['search']}' DESC");
            $query->orderByRaw("name LIKE '{$data['search']}%' DESC");

            return $query->distinct()->take(10)->get();

        });

        return $category;

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
            ->where('name', 'like', "%" .tools_replace_like($data['search']) ."%");

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


    public function categoriesWithCompaniesActives($city_id)
    {

        $query = $this->model->with('companies');

        $query->whereHas('companies', function($q) use($city_id) {
            $q->where('companies.city_id', $city_id);
            $q->where('companies.active', true);
        });

        $query->orderBY('categories.name', 'ASC');

        return $query->paginate();

    }

}
