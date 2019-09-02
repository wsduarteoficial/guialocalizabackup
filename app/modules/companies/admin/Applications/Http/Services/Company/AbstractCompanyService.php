<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Services\Company;

use GuiaLocaliza\Companies\Admin\Domains\Models\Banner\BannerRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Category\CategoryRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Client\ClientRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Company\CompanyRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Gallery\GalleryRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Phone\PhoneRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\PlanContract\PlanContractRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Subcategory\SubcategoryRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\District\DistrictRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Place\PlaceRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Zipcode\ZipcodeRepository;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

/**
 * Class AbstractCompanyService
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Services\Company
 * @author Williams Duarte <https://github.com/williamsduarte>
 * Date: 09/11/17
 * File: AbstractCompanyService.php
 */
class AbstractCompanyService
{

    /**
     * @var ZipcodeRepository
     */
    public $zipcodeRepository;

    /**
     * @var PlaceRepository
     */
    public $placeRepository;

    /**
     * @var DistrictRepository
     */
    public $districtRepository;

    public function __construct(ZipcodeRepository $zipcodeRepository,
                                PlaceRepository $placeRepository,
                                DistrictRepository $districtRepository)
    {

        $this->zipcodeRepository = $zipcodeRepository;
        $this->placeRepository = $placeRepository;
        $this->districtRepository = $districtRepository;
    }

    /**
     * Add place
     * @param Request $request
     * @return bool
     */
    public function addZipcode(Request $request)
    {

        if ( !empty( $request->input('zipcode_id') ) ) {

            $exists =  $this->zipcodeRepository->whereExists([
                'city_id' => $request->input('city_id'),
                'code' => $request->input('zipcode_id')
            ]);

            if ($exists === true) {
                return $this->zipcodeRepository->whereFirst([
                    'city_id' => $request->input('city_id'),
                    'code' => $request->input('zipcode_id')
                ]);
            }

            return $this->zipcodeRepository->create([
                'city_id' => $request->input('city_id'),
                'code' => $request->input('zipcode_id')
            ]);

        }

        return false;
    }

    /**
     * Add Place
     * @param Request $request
     * @return bool
     */
    public function addPlace(Request $request)
    {

        if ( !empty( $request->input('place') ) ) {

            $exists =  $this->placeRepository->whereExists([
                'city_id' => $request->input('city_id'),
                'name' => $request->input('place')
            ]);

            if ($exists === true) {
                return $this->placeRepository->whereFirst([
                    'city_id' => $request->input('city_id'),
                    'name' => $request->input('place')
                ]);
            }

            return $this->placeRepository->create([
                'city_id' => $request->input('city_id'),
                'name' => $request->input('place')
            ]);

        }

        return false;
    }

}
