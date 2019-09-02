<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Comment;

use GuiaLocaliza\Companies\Admin\Domains\Models\Comment\Comment;
use GuiaLocaliza\Companies\Admin\Domains\Models\Comment\CommentRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentCommentRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Comment
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentCommentRepository extends BaseEloquentAbstractRepository implements CommentRepository
{

    /**
     * EloquentCommentRepository constructor.
     * @param Comment $model
     */
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }

}
