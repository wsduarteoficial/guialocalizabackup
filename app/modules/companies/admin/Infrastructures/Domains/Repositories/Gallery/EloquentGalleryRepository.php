<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Gallery;

use GuiaLocaliza\Companies\Admin\Domains\Models\Gallery\Gallery;
use GuiaLocaliza\Companies\Admin\Domains\Models\Gallery\GalleryRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentGalleryRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Gallery
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentGalleryRepository extends BaseEloquentAbstractRepository implements GalleryRepository
{

    /**
     * EloquentGalleryRepository constructor.
     * @param Gallery $model
     */
    public function __construct(Gallery $model)
    {
        parent::__construct($model);
    }

}
