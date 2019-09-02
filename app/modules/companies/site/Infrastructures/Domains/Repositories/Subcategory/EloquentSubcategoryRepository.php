<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Subcategory;

use GuiaLocaliza\Companies\Site\Domains\Models\Subcategory\Subcategory;
use GuiaLocaliza\Companies\Site\Domains\Models\Subcategory\SubcategoryRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;
use Illuminate\Support\Facades\Cache;

/**
 * Class EloquentSubcategoryRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Subcategory
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
