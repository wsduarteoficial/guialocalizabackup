<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Subcategory;

use GuiaLocaliza\Companies\Admin\Domains\Models\Subcategory\Subcategory;
use GuiaLocaliza\Companies\Admin\Domains\Models\Subcategory\SubcategoryRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;
use Illuminate\Support\Facades\Cache;

/**
 * Class EloquentSubcategoryRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Subcategory
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentSubcategoryRepository extends BaseEloquentAbstractRepository implements SubcategoryRepository
{

    /**
     * EloquentSubcategoryRepository constructor.
     * @param Subcategory $model
     */
    public function __construct(Subcategory $model)
    {
        parent::__construct($model);
    }


    public function listAll()
    {
        return $this->model
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

    public function subcategoriesPerCategoryId($id='')
    {
        return $this->model
            ->where('category_id', $id)
            ->orderBy('name', 'asc')
            ->get();
    }


    /**
     * @var int
     */
    private $minuteCacheSuggest = 60*24*30;

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
    public function searchSubcategoryExistsReturnIds(array $data)
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

}
