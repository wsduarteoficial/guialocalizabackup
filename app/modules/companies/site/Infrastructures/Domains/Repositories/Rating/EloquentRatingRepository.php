<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Rating;

use GuiaLocaliza\Companies\Site\Domains\Models\Rating\Rating;
use GuiaLocaliza\Companies\Site\Domains\Models\Rating\RatingRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentRatingRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Rating
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
