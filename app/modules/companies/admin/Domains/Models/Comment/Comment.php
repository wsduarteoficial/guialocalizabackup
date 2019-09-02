<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Comment;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $connection = 'companies';

    protected $fillable = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
