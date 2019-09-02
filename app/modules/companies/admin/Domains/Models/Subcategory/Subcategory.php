<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Subcategory;

use GuiaLocaliza\Companies\Admin\Domains\Models\Banner\Banner;
use GuiaLocaliza\Companies\Admin\Domains\Models\Company\Company;
use GuiaLocaliza\Companies\Admin\Domains\Models\Category\Category;
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

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'subcategory_company');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function banners()
    {
        return $this->belongsToMany(Banner::class);
    }

}
