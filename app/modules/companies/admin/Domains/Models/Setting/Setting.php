<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Setting;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * @package GuiaLocaliza\Companies\Admin\Domains\Models\State
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class Setting extends Model
{

    /**
     * @var string
     */
    protected $connection = 'companies';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'title',
        'description',
        'logo_default',
        'logo_open_graph',
        'facebook',
        'twitter',
        'google',
        'instagram',
        'whatsapp',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
