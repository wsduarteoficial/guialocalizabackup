<?php

namespace GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Gallery;

use GuiaLocaliza\Companies\Site\Domains\Models\Gallery\Gallery;
use GuiaLocaliza\Companies\Site\Domains\Models\Gallery\GalleryRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentGalleryRepository
 * @package GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Gallery
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
