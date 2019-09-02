<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Place;

use GuiaLocaliza\Companies\Admin\Domains\Models\City\City;
use GuiaLocaliza\Companies\Admin\Domains\Models\State\State;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Place
 * @package GuiaLocaliza\Companies\Admin\Domains\Models\Place
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class Place extends Model
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
