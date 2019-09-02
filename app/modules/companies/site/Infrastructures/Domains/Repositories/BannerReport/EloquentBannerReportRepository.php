<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\BannerReport;

use GuiaLocaliza\Companies\Site\Domains\Models\BannerReport\BannerReport;
use GuiaLocaliza\Companies\Site\Domains\Models\BannerReport\BannerReportRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentBannerReportRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\BannerReport
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentBannerReportRepository extends BaseEloquentAbstractRepository implements BannerReportRepository
{

    /**
     * EloquentBannerReportRepository constructor.
     * @param BannerReport $model
     */
    public function __construct(BannerReport $model)
    {
        parent::__construct($model);
    }

}
