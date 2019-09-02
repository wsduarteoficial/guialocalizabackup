<?php

namespace GuiaLocaliza\Companies\Site\Domains\Models\State;

use GuiaLocaliza\Companies\Site\Domains\Models\City\City;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    protected $connection = 'companies';

    protected $fillable = [];

    public function cities()
    {
        return $this->hasMany(City::class)
            ->where('active', true)
            ->orderBy('name');

    }

}
