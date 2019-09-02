<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Company;

use GuiaLocaliza\Companies\Admin\Domains\Models\Company\Company;
use GuiaLocaliza\Companies\Admin\Domains\Models\Company\CompanyRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;
use Illuminate\Support\Facades\Cache;

/**
 * Class EloquentBaseCompanyRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Company
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentCompanyRepository extends BaseEloquentAbstractRepository implements CompanyRepository
{

    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    private $perPage = 100;

    private $minuteCache = 60*24;
    private $minuteCacheSuggest = 60*24*30;

    /**
     * Campos para listar no array
     * @var array
     */
    private $fieldsSearch = [
        'companies.id',
        'companies.company_uuid',
        'companies.plan_id',
        'companies.state_id',
        'companies.city_id',
        'companies.zipcode_id',
        'companies.place_id',
        'companies.district_id',
        'companies.numeral',
        'companies.complement',
        'companies.name_fantasy',
        'companies.active',
        'companies.updated_at',
    ];

    /**
     * @param string $active
     * @return mixed
     */
    public function listAll($active='')
    {

        $query = $this->model
            ->with('phones', 'city', 'state', 'plan');

        $query->orderBy('updated_at', 'DESC');

        if($active===true) {
            return $query->where('active', $active)->paginate($this->perPage);
        } elseif($active===false) {
            return $query->where('active', $active)->paginate($this->perPage);
        }
        return $query->paginate($this->perPage);

    }


    /**
     * List All Trash
     * @return mixed
     */
    public function listTrashed()
    {

        $query = $this->model
            ->with('phones', 'city', 'state', 'plan');

        $query->orderBy('deleted_at', 'DESC');


        return $query->onlyTrashed()->paginate($this->perPage);

    }


    /**
     * List Payments
     * @param array $data
     * @return mixed
     */
    public function listPaymentOrderByNameAsc(array $data)
    {

        $query = $this->model
            ->with('phones', 'city', 'state', 'plan', 'contract');

        $query->whereHas('contract', function ($q) use ($data) {

            $q->select('expired_at');

            if (isset($data['date_start'], $data['date_end'])) {

                if ($data['date_end'] === date('Y-m-d')) {
                    $data['date_end'] = date('Y-m-d', strtotime("+1 days",strtotime($data['date_end'])));
                }

                $q->whereBetween('expired_at',[$data['date_start'], $data['date_end']]);
            }

        });

        $query->where(function ($q) use ($data) {

            if (is_numeric($data['active'])) {
                $q->where('companies.active', $data['active']);
            }

            if (validates_is_integer_positive($data['plan_id'])) {
                $q->where('companies.plan_id', $data['plan_id']);
            }

            if (validates_is_integer_positive($data['state_id'])) {
                $q->where('companies.state_id', $data['state_id']);
            }

            if (validates_is_integer_positive($data['city_id'])) {
                $q->where('companies.city_id', $data['city_id']);
            }

        });

        $query->orderBy('name_fantasy', 'ASC');

        return $query->paginate(5000);

    }


    /**
     * List companies per Order By Name ASC and Count Click
     * @param array $data
     * @return mixed
     */
    public function listOrderByNameAscAndCountClick(array $data)
    {

        $query = $this->model
            ->with('phones', 'city', 'state', 'plan', 'clicks');

        $query->whereHas('clicks', function ($q) use ($data) {

          if (isset($data['date_start'], $data['date_end'])) {

              if ($data['date_end'] === date('Y-m-d')) {
                  $data['date_end'] = date('Y-m-d', strtotime("+1 days",strtotime($data['date_end'])));
              }

              $q->whereBetween('created_at',[$data['date_start'], $data['date_end']]);
          }

        });

        $query->where(function ($q) use ($data) {

            if (is_numeric($data['active'])) {
                $q->where('companies.active', $data['active']);
            }

            if (validates_is_integer_positive($data['plan_id'])) {
                $q->where('companies.plan_id', $data['plan_id']);
            }

            if (validates_is_integer_positive($data['state_id'])) {
                $q->where('companies.state_id', $data['state_id']);
            }

            if (validates_is_integer_positive($data['city_id'])) {
                $q->where('companies.city_id', $data['city_id']);
            }

        });

        $query->orderBy('name_fantasy', 'ASC');

        return $query->paginate(5000);

    }


    /**
     * List companies per Order By Name ASC
     * @param array $data
     * @return mixed
     */
    public function listOrderByNameAsc(array $data)
    {

        $query = $this->model
            ->with('phones', 'city', 'state', 'plan');

        $query->where(function ($q) use ($data) {

            if (is_numeric($data['active'])) {
                $q->where('companies.active', $data['active']);
            }

            if (validates_is_integer_positive($data['plan_id'])) {
                $q->where('companies.plan_id', $data['plan_id']);
            }

            if (validates_is_integer_positive($data['state_id'])) {
                $q->where('companies.state_id', $data['state_id']);
            }

            if (validates_is_integer_positive($data['city_id'])) {
                $q->where('companies.city_id', $data['city_id']);
            }

        });

        $query->orderBy('name_fantasy', 'ASC');

        return $query->paginate(5000);

    }


    /**
     * Search IN Companies
     * @param array $data
     * @param bool $specific
     * @return mixed
     */
    public function listSearch(array $data, $specific = false)
    {

        $query = $this->model
            ->with('phones', 'city', 'state', 'plan')
            ->select($this->fieldsSearch);

        if (strlen($data['search']) > 4) {

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

                if (is_numeric($data['active'])) {
                    $q->where('companies.active', $data['active']);
                }

                if (validates_is_integer_positive($data['plan_id'])) {
                    $q->where('companies.plan_id', $data['plan_id']);
                }

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

        if (!empty($data['search']) && strlen($data['search']) <= 4) {

            $query->where(function ($q) use ($data) {

                if (is_numeric($data['active'])) {
                    $q->where('companies.active', $data['active']);
                }

                if (validates_is_integer_positive($data['plan_id'])) {
                    $q->where('companies.plan_id', $data['plan_id']);
                }

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

                        if (is_numeric($data['active'])) {
                            $or->where('companies.active', $data['active']);
                        }

                        if (validates_is_integer_positive($data['plan_id'])) {
                            $or->where('companies.plan_id', $data['plan_id']);
                        }

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

        if (is_numeric($data['category_id']) && $data['category_id']>0) {

            $query->whereHas('categories', function ($q) use ($data) {

                if (is_numeric($data['active'])) {
                    $q->where('companies.active', $data['active']);
                }

                if (validates_is_integer_positive($data['plan_id'])) {
                    $q->where('companies.plan_id', $data['plan_id']);
                }

                if (validates_is_integer_positive($data['state_id'])) {
                    $q->where('companies.state_id', $data['state_id']);
                }

                if (validates_is_integer_positive($data['city_id'])) {
                    $q->where('companies.city_id', $data['city_id']);
                }

                $q->where('categories.id', $data['category_id']);

            });
        }

        if (validate_is_phone_number($data['number_phone'])) {

            $query->whereHas('phones', function ($q) use ($data) {

                if (is_numeric($data['active'])) {
                    $q->where('companies.active', $data['active']);
                }

                if (validates_is_integer_positive($data['plan_id'])) {
                    $q->where('companies.plan_id', $data['plan_id']);
                }

                if (validates_is_integer_positive($data['state_id'])) {
                    $q->where('companies.state_id', $data['state_id']);
                }

                if (validates_is_integer_positive($data['city_id'])) {
                    $q->where('companies.city_id', $data['city_id']);
                }

                if ($data['phone_type'] !== 'all') {
                    $q->where('phones.type', $data['phone_type']);
                }

                $q->where('phones.number', 'like', "%" . tools_only_numbers( $data['number_phone'] ) . "%");

            });
        }

        if ($query->distinct()->exists() !== true) {
            return false;
        }

        $query->orderBy('companies.plan_id', 'DESC');

        if (!empty($data['search'])){

            if (strlen($data['search']) > 4) {
                $query->orderByRaw("title_relevance DESC");
            } else {
                $query->orderByRaw("companies.name_fantasy = '{$data['search']}' DESC");
                $query->orderByRaw("companies.name_fantasy LIKE '{$data['search']}%' DESC");
            }

            return $query->paginate();

        }

        $query->orderBy('companies.name_fantasy', 'ASC');

        if (is_numeric($data['active'])) {
            $query->where('companies.active', $data['active']);
        }

        if (validates_is_integer_positive($data['plan_id'])) {
            $query->where('companies.plan_id', $data['plan_id']);
        }

        if (validates_is_integer_positive($data['state_id'])) {
            $query->where('companies.state_id', $data['state_id']);
        }

        if (validates_is_integer_positive($data['city_id'])) {
            $query->where('companies.city_id', $data['city_id']);
        }

        return $query->paginate();

    }

    public function findCompanyPerId($id)
    {
        $query = $this->model
            ->with('categories', 'subcategories', 'phones', 'city', 'state', 'gallery', 'zipcode')
            ->find($id);
        return $query;
    }

}
