<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Category;

use GuiaLocaliza\Companies\Admin\Domains\Models\Banner\Banner;
use GuiaLocaliza\Companies\Admin\Domains\Models\Company\Company;
use GuiaLocaliza\Companies\Admin\Domains\Models\Subcategory\Subcategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

  protected $connection = 'companies';

  protected $fillable = [
    'id',
    'name',
    'active'
  ];
  

  protected $dates = [
    'created_at',
    'updated_at',
  ];

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

  public function subcategories()
  {
    return $this->hasMany(Subcategory::class)->orderBy('name', 'asc');
  }

}
