<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Coupon;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{

    protected $connection = 'companies';

    protected $fillable = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
