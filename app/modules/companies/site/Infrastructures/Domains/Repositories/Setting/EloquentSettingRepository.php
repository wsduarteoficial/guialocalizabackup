<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Setting;

use GuiaLocaliza\Companies\Site\Domains\Models\Setting\Setting;
use GuiaLocaliza\Companies\Site\Domains\Models\Setting\SettingRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentSettingRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Setting
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
