<?php

namespace GuiaLocaliza\Companies\Site\Domains\Models\Company;

use GuiaLocaliza\Companies\Site\Domains\Models\Banner\Banner;
use GuiaLocaliza\Companies\Site\Domains\Models\Category\Category;
use GuiaLocaliza\Companies\Site\Domains\Models\City\City;
use GuiaLocaliza\Companies\Site\Domains\Models\Click\Click;
use GuiaLocaliza\Companies\Site\Domains\Models\District\District;
use GuiaLocaliza\Companies\Site\Domains\Models\Gallery\Gallery;
use GuiaLocaliza\Companies\Site\Domains\Models\Phone\Phone;
use GuiaLocaliza\Companies\Site\Domains\Models\Place\Place;
use GuiaLocaliza\Companies\Site\Domains\Models\State\State;
use GuiaLocaliza\Companies\Site\Domains\Models\Subcategory\Subcategory;
use GuiaLocaliza\Companies\Site\Domains\Models\Zipcode\Zipcode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Company
 * @package GuiaLocaliza\Companies\Site\Domains\Models\Company
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
        'company_uuid',
        'plan_id',
        'state_id',
        'city_id',
        'zipcode_id',
        'place_id',
        'district_id',
        'name_fantasy',
        'description',
        'cpf_cnpj',
        'numeral',
        'complement',
        'website',
        'email',
        'facebook',
        'twitter',
        'google',
        'name_responsible',
        'tags',
        'active'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // public function setNameFantasyAttribute($value='')
    // {
    //     $this->attributes['name_fantasy'] = strtolower($value);
    // }

    public function getNameFantasyAttribute($value)
    {
        return mb_strtoupper($value, 'utf8');
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
        return $this->belongsTo(Click::class);
    }


    public function bannerTop($id='')
    {

        if(!empty($id)) {

            $exists = Banner::where('position_search', 'top_left')
                ->where('company_id', $id)
                ->exists();

            if($exists) {

                $res = Banner::where('position_search', 'top_left')
                ->where('company_id', $id)
                ->first();

                return $res->image;

            }          

        }
        
        return false;

    }

    public function banner()
    {
        return $this->belongsTo(Banner::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
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
