<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\District;

use GuiaLocaliza\Companies\Admin\Domains\Models\State\State;
use GuiaLocaliza\Companies\Admin\Domains\Models\City\City;
use Illuminate\Database\Eloquent\Model;

/**
 * Class District
 * @package GuiaLocaliza\Companies\Admin\Domains\Models\District
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class District extends Model
{

    /**
     * @var string
     */
    protected $connection = 'companies';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'city_id',
        'name',
        'active'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

}
