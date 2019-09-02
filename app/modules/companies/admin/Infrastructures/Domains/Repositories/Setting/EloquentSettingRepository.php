<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Setting;

use GuiaLocaliza\Companies\Admin\Domains\Models\Setting\Setting;
use GuiaLocaliza\Companies\Admin\Domains\Models\Setting\SettingRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentSettingRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Setting
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentSettingRepository extends BaseEloquentAbstractRepository implements SettingRepository
{

    /**
     * EloquentSettingRepository constructor.
     * @param Setting $model
     */
    public function __construct(Setting $model)
    {
        parent::__construct($model);
    }

}
