<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Log;

use GuiaLocaliza\Companies\Site\Domains\Models\Log\LogSearch;
use GuiaLocaliza\Companies\Site\Domains\Models\Log\LogSearchRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentLogSearchRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Log
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

    /**
     * Verify exists data equals in database tag and ip
     * @param $tag_search
     * @param $ip
     * @return mixed
     */
    public function dataEqualsPerIp($tag_search, $ip)
    {
        return $this->model->where('tag_search', $tag_search)
                            ->where('ip', $ip)
                            ->exists();
    }

}
