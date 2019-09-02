<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Phone;

use GuiaLocaliza\Companies\Admin\Domains\Models\Phone\Phone;
use GuiaLocaliza\Companies\Admin\Domains\Models\Phone\PhoneRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentPhoneRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Phone
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentPhoneRepository extends BaseEloquentAbstractRepository implements PhoneRepository
{

    /**
     * EloquentPhoneRepository constructor.
     * @param Phone $model
     */
    public function __construct(Phone $model)
    {
        parent::__construct($model);
    }

    /**
     * List Phones
     * @param array $data
     * @return mixed
     */

    public function listOrderByPhoneAsc(array $data)
    {

        $query = $this->model->with('companies');

        $query->whereHas('companies', function ($q) use ($data) {

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

        $query->orderBy('number', 'ASC');
        return $query->paginate(5000);

    }

    public function existsNumber(array $array)
    {

        $number = tools_only_numbers($array['number']);
        $company_id = intval($array['company_id']);

        $query = $this->model->with('companies');

        $query->whereHas('companies', function($q) use ($company_id) {
            $q->where('companies.id', '!=', $company_id);
        });

        if(!$query->where('number', $number)->exists()) {
            return ([
                'exists' => false
            ]);
        }

        return $query->where('number', $number)->first();

    }


    public function checkExistsPhoneCompany($number, $company_id='')
    {

        $number = tools_only_numbers($number);

        $query = $this->model->with('companies');

        $query->whereHas('companies', function($q) use($company_id) {
            $q->where('companies.id',$company_id);
        });

        if($query->where('number', $number)->exists()) {
            return true;
        }

        return false;

    }

}
