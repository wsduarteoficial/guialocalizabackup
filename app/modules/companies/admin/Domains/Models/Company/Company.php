<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Company;

use GuiaLocaliza\Companies\Admin\Domains\Models\Banner\Banner;
use GuiaLocaliza\Companies\Admin\Domains\Models\Category\Category;
use GuiaLocaliza\Companies\Admin\Domains\Models\City\City;
use GuiaLocaliza\Companies\Admin\Domains\Models\Click\Click;
use GuiaLocaliza\Companies\Admin\Domains\Models\District\District;
use GuiaLocaliza\Companies\Admin\Domains\Models\Gallery\Gallery;
use GuiaLocaliza\Companies\Admin\Domains\Models\Phone\Phone;
use GuiaLocaliza\Companies\Admin\Domains\Models\Place\Place;
use GuiaLocaliza\Companies\Admin\Domains\Models\State\State;
use GuiaLocaliza\Companies\Admin\Domains\Models\Subcategory\Subcategory;
use GuiaLocaliza\Companies\Admin\Domains\Models\Zipcode\Zipcode;
use GuiaLocaliza\Companies\Admin\Domains\Models\Plan\Plan;
use GuiaLocaliza\Companies\Admin\Domains\Models\PlanContract\PlanContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Company
 * @package GuiaLocaliza\Companies\Admin\Domains\Models\Company
 */
class Company extends Model
{

    use SoftDeletes;

    /**
     * @var string
     */
    protected $connection = 'companies';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'company_uuid',
        'plan_id',
        'state_id',
        'city_id',
        'zipcode_id',
        'place_id',
        'district_id',
        'name_fantasy',
        'description',
        'numeral',
        'complement',
        'website',
        'email',
        'facebook',
        'twitter',
        'google',
        'name_responsible',
        'tags',
        'active',
        'tag_title',
        'tag_description'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function setTagsAttribute($value)
    {
        $value = str_replace(",  ", ", ", $value);
        $this->attributes['tags'] = str_replace(",", ", ", $value);
    }

    public function setDistrictIdAttribute($value)
    {
        if(isset( $_POST['district'] ) && !empty($_POST['district'])) {
            $this->attributes['district_id'] = $value;
        } else {
            $this->attributes['district_id'] = null;
        }

    }

    public function setPlaceIdAttribute($value)
    {
        if(isset( $_POST['place'] ) && !empty($_POST['place'])) {
            $this->attributes['place_id'] = $value;
        } else {
            $this->attributes['place_id'] = null;
        }
    }

    public function phones()
    {
        return $this->belongsToMany(Phone::class)->orderBy('type', 'ASC');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class, 'subcategory_company');
    }

    public function clicks()
    {
        return $this->belongsTo(Click::class, 'id', 'company_id');
    }

    public function contract()
    {
        return $this->belongsTo(PlanContract::class, 'id', 'company_id');
    }

    public function getDatePlanContract($id='')
    {
        $res = \DB::table('plan_contracts')
            ->where('company_id', '=', $id)
            ->select('expired_at')
            ->first();

          return $res->expired_at;
    }

    public function countClicks($id, $date_start='', $date_end='')
    {

        if (isset($date_start, $date_end)) {

          if ($date_end === date('Y-m-d')) {
              $date_end = date('Y-m-d', strtotime("+1 days",strtotime($date_end)));
          }

          return Click::where('company_id', $id)
            ->whereBetween('created_at',[$date_start, $date_end])
            ->count();
        }

        return Click::where('company_id', $id)->count();
    }


    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }

    public function getPathBanner($id='', $position='')
    {

        if(isset($id, $position) && is_numeric($id)) {

            $res = Banner::where(['company_id' => $id])
                            ->where(['position_search' => $position])
                            ->first();

            if($res)
                return $res->image;
            return false;

        }

        return false;

    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function zipcode()
    {
        return $this->belongsTo(Zipcode::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

}
