<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\City;

use GuiaLocaliza\Companies\Admin\Domains\Models\State\State;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * @package GuiaLocaliza\Companies\Admin\Domains\Models\City
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class City extends Model
{

    /**
     * @var string
     */
    protected $connection = 'companies';

    /**
     * @var array
     */
    protected $fillable = ['name', 'state_id', 'active', 'default'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @return $this
     */
    public function state()
    {
        return $this->belongsTo(State::class)->select(['id', 'name', 'abbr']);
    }

}
