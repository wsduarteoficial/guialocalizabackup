<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Click;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Click
 * @package GuiaLocaliza\Companies\Admin\Domains\Models\Click
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class Click extends Model
{

    /**
     * @var string
     */
    protected $connection = 'companies';

    /**
     * @var array
     */
    protected $fillable = [
        'company_id',
        'phone_id',
        'url',
        'ip',
        'agent'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
