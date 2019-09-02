<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Banner;

use GuiaLocaliza\Companies\Site\Domains\Models\Banner\Banner;
use GuiaLocaliza\Companies\Site\Domains\Models\Banner\BannerRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentBannerRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Banner
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentBannerRepository extends BaseEloquentAbstractRepository implements BannerRepository
{

    private $filter_state = false;
    private $filter_city = false;
    private $filter_subcategory = false;
    private $filter_category = false;

    /**
     * EloquentBannerRepository constructor.
     * @param Banner $model
     */
    public function __construct(Banner $model)
    {
        parent::__construct($model);
    }


    /**
     * Filter Banner Per Categories
     * @param array $data
     * @return mixed
     */
    public function filterBannersPerCategory(array $data)
    {
       
        $this->filter_category = true;

        if(isset($data['state_id']) && $data['state_id'] > 0) {
            $this->filter_state = true;
        }

        if(isset($data['city_id']) && $data['city_id'] > 0) {
            $this->filter_city = true;
        }
   
        $res = $this->filterBanners($data);
        if ($res !== false) {
            return $res;
        }

        $this->filter_city = false;
        $res = $this->filterBanners($data);
        if ($res !== false) {            
            return $res;
        }   

        $this->filter_state =false;
        $this->filter_city = false;
        return $this->filterBanners($data);

    }

        /**
     * Filter Banner Per Subcategories
     * @param array $data
     * @return mixed
     */
    public function filterBannersPerSubcategory(array $data)
    {   
        $this->filter_subcategory = true;

        if(isset($data['state_id']) && $data['state_id'] > 0) {
            $this->filter_state = true;
        }

        if(isset($data['city_id']) && $data['city_id'] > 0) {
            $this->filter_city = true;
        }

        $res = $this->filterBanners($data);
        if ($res !== false) {
            return $res;
        }

        $this->filter_city = false;
        $res = $this->filterBanners($data);
        if ($res !== false) {            
            return $res;
        }

        $this->filter_state =false;
        $this->filter_city = false;
        return $this->filterBanners($data);
    }

    /**
     * Filter Banner Per City And Categories And Subcategories
     * @param array $data
     * @return mixed
     */
    private function filterBanners(array $data)
    {       

        $query = $this->model->where('position_search', 'right_side');
        
        $query->whereExists(function ($q) use ($data) {

            $q->select(\DB::raw('companies.name_fantasy'))
                ->from('companies')
                ->whereRaw('companies.id = banners.company_id');

            if ($this->filter_state === true) {
                if (validates_is_integer_positive($data['state_id'])) {
                    $q->where('state_id', $data['state_id']);
                }
            }

            if ($this->filter_city === true) {
                if (validates_is_integer_positive($data['city_id'])) {
                    $q->where('city_id', $data['city_id']);
                }
            }

        });
     

        if ($this->filter_category === true) {

            $query->whereExists(function ($q) use ($data) {
                $q->select(\DB::raw(1))
                    ->from('banner_category')
                    ->whereRaw('banner_category.banner_id = banners.id')
                    ->whereIn('banner_category.category_id', $data['categories_ids'] );

            });

        }

        if ($this->filter_subcategory === true) {

            if(count($data['subcategories_ids'])>0){

                $query->whereExists(function ($q) use ($data) {
                    $q->select(\DB::raw(1))
                        ->from('banner_subcategory')
                        ->whereRaw('banner_subcategory.banner_id = banners.id')
                        ->whereIn('banner_subcategory.subcategory_id', $data['subcategories_ids']);

                });

            }            

        } 

        if ($query->distinct()->exists() !== true) {
            return false;
        }

        return $query->take(isset($data['total_per_page']) ? $data['total_per_page'] : 1)
                     ->inRandomOrder()->get();

    }

}
