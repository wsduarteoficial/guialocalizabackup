<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Rating;

use GuiaLocaliza\Companies\Admin\Domains\Models\Rating\Rating;
use GuiaLocaliza\Companies\Admin\Domains\Models\Rating\RatingRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentRatingRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Rating
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentRatingRepository extends BaseEloquentAbstractRepository implements RatingRepository
{

    /**
     * EloquentRatingRepository constructor.
     * @param Rating $model
     */
    public function __construct(Rating $model)
    {
        parent::__construct($model);
    }

}
