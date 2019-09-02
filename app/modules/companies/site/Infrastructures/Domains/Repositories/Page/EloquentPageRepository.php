<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Page;

use GuiaLocaliza\Companies\Site\Domains\Models\Page\Page;
use GuiaLocaliza\Companies\Site\Domains\Models\Page\PageRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentPageRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Page
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentPageRepository extends BaseEloquentAbstractRepository implements PageRepository
{

    /**
     * EloquentPageRepository constructor.
     * @param Page $model
     */
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }

}
