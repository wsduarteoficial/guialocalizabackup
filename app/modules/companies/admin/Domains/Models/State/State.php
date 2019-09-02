<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\State;

use GuiaLocaliza\Companies\Admin\Domains\Models\City\City;
use Illuminate\Database\Eloquent\Model;

/**
 * Class State
 * @package GuiaLocaliza\Companies\Admin\Domains\Models\State
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class State extends Model
{

    /**
     * @var string
     */
    protected $connection = 'companies';

    /**
     * @var array
     */
    protected $fillable = ['active'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @return $this
     */
    public function cities()
    {
        return $this->hasMany(City::class)->orderBy('name');

    }

}
