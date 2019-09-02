<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\City\CityRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\District\DistrictRepository;
use Illuminate\Http\Request;
use Validator;


/**
 * Class DistrictController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class DistrictController extends BaseController
{

    /**
     * @var DistrictRepository
     */
    private $repository;

    /**
     * @var CityRepository
     */
    private $cityRepository;

    /**
     * DistrictController constructor.
     * @param DistrictRepository $repository
     * @param CityRepository $cityRepository
     */
    public function __construct(DistrictRepository $repository, CityRepository $cityRepository)
    {
        $this->repository = $repository;
        $this->cityRepository = $cityRepository;
    }

    /**
     * List Data
     * @param Request $request
     * @return $this
     */
    public function listAll(Request $request)
    {
        $data = [];
        $data['city'] = $this->cityRepository->findCityWithState($request->route('id'));
        $data['districts'] = $this->repository->listAll($request->route('id'));
        return $this->view('district.list')->with($data);
    }

}

