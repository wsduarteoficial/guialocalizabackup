<?php

namespace GuiaLocaliza\Companies\Site\Domains\Models\Category;

use GuiaLocaliza\Companies\Site\Domains\Models\State\State;
use GuiaLocaliza\Companies\Site\Domains\Models\City\City;
use GuiaLocaliza\Companies\Site\Domains\Models\Banner\Banner;
use GuiaLocaliza\Companies\Site\Domains\Models\Company\Company;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $connection = 'companies';

    protected $fillable = [
        'id',
        'name',
        'active'
    ];

    public function state()
    {
        return $this->belongsTo(State::class)->select(['id', 'name', 'abbr']);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function banners()
    {
        return $this->belongsToMany(Banner::class)
            ->where('position_search', 'right_side')
            ->distinct()
            ->inRandomOrder();
    }

}
