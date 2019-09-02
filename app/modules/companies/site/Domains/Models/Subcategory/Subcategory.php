<?php

namespace GuiaLocaliza\Companies\Site\Domains\Models\Subcategory;

use GuiaLocaliza\Companies\Site\Domains\Models\Banner\Banner;
use GuiaLocaliza\Companies\Site\Domains\Models\Company\Company;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{

    protected $connection = 'companies';

    protected $fillable = [
        'id',
        'category_id',
        'name',
        'active'
    ];

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'subcategory_company');
    }

    public function banners()
    {
        return $this->belongsToMany(Banner::class);
    }

}
