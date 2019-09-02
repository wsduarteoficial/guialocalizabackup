<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Log;

use GuiaLocaliza\Companies\Admin\Domains\Models\Log\LogSearch;
use GuiaLocaliza\Companies\Admin\Domains\Models\Log\LogSearchRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentLogSearchRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Log
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentLogSearchRepository extends BaseEloquentAbstractRepository implements LogSearchRepository
{

    /**
     * EloquentLogSearchRepository constructor.
     * @param LogSearch $model
     */
    public function __construct(LogSearch $model)
    {
        parent::__construct($model);
    }

    public function logs(array $data)
    {
     
        $query = $this->model
            ->with('city', 'state');
    
        if (isset($data['date_start'], $data['date_end'])) {
                
            if ($data['date_end'] === date('Y-m-d')) {
                $data['date_end'] = date('Y-m-d', strtotime("+1 days",strtotime($data['date_end'])));
            }
            $query->whereBetween('created_at',[$data['date_start'], $data['date_end']]);

        }

        if (validates_is_integer_positive($data['state_id'])) {
            $query->where('state_id', $data['state_id']);
        }

        if (validates_is_integer_positive($data['city_id'])) {
            $query->where('city_id', $data['city_id']);
        }

        $query->orderBy('created_at', 'DESC');

        return $query->paginate(5000);
    }
}
