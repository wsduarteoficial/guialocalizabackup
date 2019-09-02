<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Coupon;

use GuiaLocaliza\Companies\Admin\Domains\Models\Coupon\Coupon;
use GuiaLocaliza\Companies\Admin\Domains\Models\Coupon\CouponRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentCouponRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Coupon
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentCouponRepository extends BaseEloquentAbstractRepository implements CouponRepository
{

    /**
     * EloquentCouponRepository constructor.
     * @param Coupon $model
     */
    public function __construct(Coupon $model)
    {
        parent::__construct($model);
    }

}
