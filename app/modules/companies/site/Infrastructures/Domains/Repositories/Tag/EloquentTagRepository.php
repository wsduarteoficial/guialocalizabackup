<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Tag;

use GuiaLocaliza\Companies\Site\Domains\Models\Tag\Tag;
use GuiaLocaliza\Companies\Site\Domains\Models\Tag\TagRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentTagRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Tag
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentTagRepository extends BaseEloquentAbstractRepository implements TagRepository
{

    /**
     * EloquentTagRepository constructor.
     * @param Tag $model
     */
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

}
