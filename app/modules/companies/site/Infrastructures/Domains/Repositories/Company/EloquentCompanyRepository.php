<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Company;

use GuiaLocaliza\Companies\Site\Domains\Models\Company\Company;
use GuiaLocaliza\Companies\Site\Domains\Models\Company\CompanyRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;

/**
 * Class EloquentBaseCompanyRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Company
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentCompanyRepository extends BaseEloquentAbstractRepository implements CompanyRepository
{

    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    private $perPage = 30;

    private $minuteCache = 60*24*7;
    private $minuteCacheSuggest = 60*24;

    /**
     * Campos para listar no array
     * @var array
     */
    private $fieldsSearch = [
        'companies.*'
    ];

    private function existsCompanyEqualsSearch(array $data)
    {

        $query = $this->model;

        return $query->where('active', true)
            ->where('name_fantasy', 'like', '%' .tools_replace_like( $data['search'] ). '%' )
            ->where(function($q) use ($data) {

                if (validates_is_integer_positive($data['state_id'])) {
                    $q->where('state_id', $data['state_id']);
                }

                if (validates_is_integer_positive($data['city_id'])) {
                    $q->where('city_id', $data['city_id']);
                }

            })->exists();

    }


    /**
     * Get Id Company
     * @return mixed
     */
    public function getCompaniesAll()
    {

        $tag = sprintf('companies-sitemap');

        $company = Cache::remember(str_slug($tag), 60*24*7, function () {

            $query = $this->model
                ->with( 'city', 'state', 'place', 'district')
                ->where('active', true);

            return $query->limit(5000)->orderBy('updated_at', 'desc')->get();

        });

        return $company;

    }

    private function getIdPerUrlFull() {

        $re = '/\d+/';
        $str = URL::full();
        preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

        if(isset($matches[1][0]) && is_numeric($matches[1][0])) {
            return (int)$matches[1][0];
        }

        return false;

    }

    private function filterIdCompany($company_id = '')
    {

        $tag = sprintf('seo-company-id-%d', $company_id);

        $company = Cache::remember(str_slug($tag), 60*24*90, function () use($company_id) {

            $query = $this->model
                ->with('categories', 'subcategories', 'phones' ,'city', 'state', 'place', 'gallery');

            return $query->find( $company_id );

        });

        return $company;

    }

    /**
     * Get Id Company
     * @return mixed
     */
    public function getIdCompany($company_id = '')
    {

        $result = $this->filterIdCompany( intval( $company_id ) );
        if(!$result) {
            $result = $this->filterIdCompany($this->getIdPerUrlFull());
        }
        return $result;

    }


    /**
     * Search IN Companies
     * @param array $data
     * @return mixed
     */
    public function searchCompanies(array $data, $specific = false)
    {

        $tagspecific = ($specific === true) ? 'true' : 'false';
        $tag = $data['search'] . $tagspecific . $data['state_id'] . $data['city_id'] . $data['page'] . __FUNCTION__;

        $company = Cache::remember(str_slug($tag) , $this->minuteCache, function () use($data, $specific) {

            $searchPerLike = $this->existsCompanyEqualsSearch($data);

            $query = $this->model
                ->with('categories', 'subcategories', 'phones', 'gallery')
                ->select($this->fieldsSearch);

            if ( ( $searchPerLike !== true && strlen( $data['search'] ) > 4 ) ) {

                $match_title = "
                match (
                    companies.name_fantasy
                ) against (
                    ? IN BOOLEAN MODE
                ) as title_relevance";

                $match = "
                match (
                    companies.name_fantasy,
                    companies.description,
                    companies.tags
                ) against (
                    ?
                    IN BOOLEAN MODE
                )";

                $query->selectRaw($match_title, array(sprintf('"%s"', $data['search'])));

                $query->where( function ($q) use ($data, $specific, $match_title, $match) {

                    $q->where('companies.active', true);

                    if (validates_is_integer_positive($data['state_id'])) {
                        $q->where('companies.state_id', $data['state_id']);
                    }

                    if (validates_is_integer_positive($data['city_id'])) {
                        $q->where('companies.city_id', $data['city_id']);
                    }

                    if ($specific === true) {
                        $q->whereRaw($match, array(sprintf('"%s"', $data['search'])));
                    } else {
                        $q->whereRaw($match, array(sprintf('%s', $data['search'])));
                    }

                });

            }

            if ( strlen($data['search']) <= 4 || $searchPerLike === true ) {

                $query->where(function ($q) use ($data) {

                    $q->where('companies.active', true);

                    if (validates_is_integer_positive($data['state_id'])) {
                        $q->where('companies.state_id', $data['state_id']);
                    }

                    if (validates_is_integer_positive($data['city_id'])) {
                        $q->where('companies.city_id', $data['city_id']);
                    }

                    if (strlen($data['search']) <= 3) {
                        $q->where('companies.name_fantasy', 'like', tools_replace_like($data['search']) . "%");
                    } else {
                        $q->where('companies.name_fantasy', 'like', "%" . tools_replace_like($data['search']) . "%");
                    }

                    if (strlen($data['search']) > 2) {

                        $q->orWhere(function ($or) use ($data) {

                            $or->where('companies.active', true);

                            if (validates_is_integer_positive($data['state_id'])) {
                                $or->where('companies.state_id', $data['state_id']);
                            }

                            if (validates_is_integer_positive($data['city_id'])) {
                                $or->where('companies.city_id', $data['city_id']);
                            }

                            if (strlen($data['search']) <= 3) {
                                $or->where('companies.tags', 'like', tools_replace_like($data['search']) . "%");
                            } else {
                                $or->where('companies.tags', 'like', "%" . tools_replace_like($data['search']) . "%");
                            }

                        });

                    }

                });

            }

            if ($query->distinct()->exists() !== true) {
                return false;
            }

            $query->orderBy('companies.plan_id', 'DESC');

            if ( ( $searchPerLike !== true && strlen( $data['search'] ) > 4 ) ) {
                $query->orderByRaw("title_relevance DESC");
            } else {
                $query->orderByRaw("companies.name_fantasy = '{$data['search']}' DESC");
                $query->orderByRaw("companies.name_fantasy LIKE '{$data['search']}%' DESC");
            }
            return $query->get();
        });

        return $company;

    }

    /**
     * Search With IDs Company per Categories
     * @param array $data
     * @return mixed
     */
    public function searchCategoriesIds(array $data)
    {

        $tag = $data['search'] . $data['state_id'] . $data['city_id'] . $data['page'] . __FUNCTION__;
        $company = Cache::remember(str_slug($tag) , $this->minuteCache, function () use($data) {

            $query = $this->model
            ->with('categories')
            ->select('id');

            $query->whereHas('categories', function ($q) use ($data) {

                $q->where('companies.active', true);

                if (validates_is_integer_positive($data['state_id'])) {
                    $q->where('companies.state_id', $data['state_id']);
                }

                if (validates_is_integer_positive($data['city_id'])) {
                    $q->where('companies.city_id', $data['city_id']);
                }

                $q->whereIn('categories.id', $data['ids']);

            });

            if ($query->distinct()->exists() !== true) {
                return false;
            }

            $query->orderBy('companies.plan_id', 'DESC');
            $query->orderByRaw("companies.name_fantasy ASC");

            return $query->get();

        });

        return $company;

    }

    /**
     * Search With IDs Company per SubCategories
     * @param array $data
     * @return mixed
     */
    public function searchSubCategoriesIds(array $data)
    {

        $tag = $data['search'] . $data['state_id'] . $data['city_id'] . $data['page'] . __FUNCTION__;

        $company = Cache::remember(str_slug($tag) , $this->minuteCache, function () use($data) {

            $query = $this->model
            ->with('subcategories')
            ->select('id');

            $query->whereHas('subcategories', function ($q) use ($data) {

                $q->where('companies.active', true);

                if (validates_is_integer_positive($data['state_id'])) {
                    $q->where('companies.state_id', $data['state_id']);
                }

                if (validates_is_integer_positive($data['city_id'])) {
                    $q->where('companies.city_id', $data['city_id']);
                }

                $q->whereIn('subcategories.id', $data['ids']);

            });

            if ($query->distinct()->exists() !== true) {
                return false;
            }

            $query->orderBy('companies.plan_id', 'DESC');
            $query->orderByRaw("companies.name_fantasy ASC");

            return $query->get();

        });

        return $company;

    }


    /**
     * Search With Categories
     * @param array $data
     * @return mixed
     */
    public function searchCategories(array $data)
    {

        $tag = $data['search'] . $data['state_id'] . $data['city_id'] . $data['page'] . __FUNCTION__;

        $company = Cache::remember(str_slug($tag) , $this->minuteCache, function () use($data) {

            $query = $this->model
            ->with('categories', 'subcategories', 'phones')
            ->select($this->fieldsSearch);

            $query->whereHas('categories', function ($q) use ($data) {

                $q->where('companies.active', true);

                if (validates_is_integer_positive($data['state_id'])) {
                    $q->where('companies.state_id', $data['state_id']);
                }

                if (validates_is_integer_positive($data['city_id'])) {
                    $q->where('companies.city_id', $data['city_id']);
                }

                $q->whereIn('categories.id', $data['ids']);

            });

            if ($query->distinct()->exists() !== true) {
                return false;
            }

            $query->orderBy('companies.plan_id', 'DESC');
            $query->orderByRaw("companies.name_fantasy ASC");

            return $query->paginate($this->perPage);

        });

        return $company;

    }


    /**
     * Filter Per Categories and City
     * @param array $data
     * @return mixed
     */
    public function filterPerCategoriesCity(array $data)
    {

        $tag = $data['city_id'] . $data['category_id'] . $data['page'] . __FUNCTION__;

        $company = Cache::remember(str_slug($tag) , $this->minuteCache, function () use($data) {

            $query = $this->model
                ->with('categories', 'subcategories', 'phones')
                ->select($this->fieldsSearch);

            $query->whereHas('categories', function ($q) use ($data) {

                $q->where('companies.active', true);

                if (validates_is_integer_positive($data['city_id'])) {
                    $q->where('companies.city_id', $data['city_id']);
                }

                $q->where('categories.id', $data['category_id']);

            });

            if ($query->distinct()->exists() !== true) {
                return false;
            }

            $query->orderBy('companies.plan_id', 'DESC');
            $query->orderByRaw("companies.name_fantasy ASC");

            return $query->paginate($this->perPage);

        });

        return $company;

    }


    /**
     * Search Per Telephone
     * @param array $data
     * @return mixed
     */
    public function searchPerTelephone(array $data)
    {

        $tag = $data['search'] . $data['state_id'] . $data['city_id'] . $data['page'] . __FUNCTION__;

        $company = Cache::remember($tag , $this->minuteCache, function () use($data) {

            $query = $this->model->with('phones')->select('id');

            $query->whereHas('phones', function ($q) use ($data) {

                $q->where('companies.active', true);
                if (validates_is_integer_positive($data['state_id'])) {
                    $q->where('companies.state_id', $data['state_id']);
                }

                if (validates_is_integer_positive($data['city_id'])) {
                    $q->where('companies.city_id', $data['city_id']);
                }

                $q->where('phones.number', 'like', "%" . $data['number_phone']);

            });

            if ($query->distinct()->exists() !== true) {
                return false;
            }

            return $query->get();

        });

        return $company;

    }

    /**
     * Search Suggest
     * @param array $data
     * @return mixed
     */
    public function searchCompaniesSuggest(array $data)
    {

        $tag = $data['search'] . $data['state_id'] . $data['city_id'] . $data['page'] . __FUNCTION__;

        $company = Cache::remember(str_slug($tag) , $this->minuteCacheSuggest, function () use($data) {

            $match = "
                match (
                    name_fantasy
                ) against (
                    ?
                    IN BOOLEAN MODE
                )";

            $query = $this->model->select(
                'name_fantasy'
            );

            $query->where(function ($q) use ($data, $match) {

                $q->where('active', true);

                if (validates_is_integer_positive($data['state_id'])) {
                    $q->where('state_id', $data['state_id']);
                }

                if (validates_is_integer_positive($data['city_id'])) {
                    $q->where('city_id', $data['city_id']);
                }

                $q->whereRaw($match, array(sprintf('%s', $data['search'])));

            });

            $query->orWhere(function($q) use ($data) {

                $q->where('active', true);

                if (validates_is_integer_positive($data['state_id'])) {
                    $q->where('state_id', $data['state_id']);
                }

                if (validates_is_integer_positive($data['city_id'])) {
                    $q->where('city_id', $data['city_id']);
                }

                $q->where('name_fantasy', 'like', "%" . tools_replace_like($data['search']) . "%");

            });

            if ($query->distinct()->exists() !== true) {
                return false;
            }

            $query->orderByRaw($match . " DESC", array($data['search']), "name_fantasy ASC");
            $query->orderByRaw("name_fantasy = '{$data['search']}' DESC");
            $query->orderByRaw("name_fantasy LIKE '{$data['search']}%' DESC");

            return $query->distinct()->take(10)->get();

        });

        return $company;

    }

    /**
     * Get data per redirect url Ads
     * @param $id
     * @return mixed
     */
    public function getDataPerUrlAds($id)
    {

        $query = $this->model
            ->with('state', 'city', 'district')
            ->select($this->fieldsSearch)
            ->find($id);

        return $query;

    }


    /**
     * Search With Categories
     * @param array $data
     * @return mixed
     */
    public function filterCompaniesPerIds(array $data)
    {

        $tag = $data['search'] . $data['state_id'] . $data['city_id'] . $data['page'] . __FUNCTION__;

        $company = Cache::remember(str_slug($tag) , $this->minuteCacheSuggest, function () use($data) {

            $query = $this->model
                ->with('categories', 'subcategories', 'phones')
                ->select($this->fieldsSearch);

            $query->where('companies.active', true);

            if (validates_is_integer_positive($data['state_id'])) {
                $query->where('companies.state_id', $data['state_id']);
            }

            if (validates_is_integer_positive($data['city_id'])) {
                $query->where('companies.city_id', $data['city_id']);
            }

            if (count( $data['companies_ids'] ) <= 0 ) {
                return false;
            }

            $query->find($data['companies_ids']);

            if ($query->distinct()->exists() !== true) {
                return false;
            }

            $query->orderBy('companies.plan_id', 'DESC');
            $query->orderByRaw("companies.name_fantasy ASC");

            return $query->paginate($this->perPage);

        });

        return $company;

    }


}
