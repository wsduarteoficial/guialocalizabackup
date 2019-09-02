<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\BannerReport;

use GuiaLocaliza\Companies\Admin\Domains\Models\BannerReport\BannerReport;
use GuiaLocaliza\Companies\Admin\Domains\Models\BannerReport\BannerReportRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentBannerReportRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\BannerReport
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
