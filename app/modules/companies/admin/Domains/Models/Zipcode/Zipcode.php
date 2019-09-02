<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Zipcode;

use GuiaLocaliza\Companies\Admin\Domains\Models\City\City;
use GuiaLocaliza\Companies\Admin\Domains\Models\State\State;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Zipcode
 * @package GuiaLocaliza\Companies\Admin\Domains\Models\Zipcode
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class Zipcode extends Model
{

    /**
     * @var string
     */
    protected $connection = 'companies';

    /**
     * @var array
     */
    protected $fillable = [
        'state_id',
        'city_id',
        'code',
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
