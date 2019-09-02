<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\City\CityRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Zipcode\ZipcodeRepository;
use Illuminate\Http\Request;

/**
 * Class ZipcodeController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class ZipcodeController extends BaseController
{

    /**
     * @var ZipcodeRepository
     */
    private $repository;

    /**
     * @var CityRepository
     */
    private $cityRepository;

    /**
     * ZipcodeController constructor.
     * @param ZipcodeRepository $repository
     * @param CityRepository $cityRepository
     */
    public function __construct(ZipcodeRepository $repository, CityRepository $cityRepository)
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
        $data['zipcodes'] = $this->repository->listAll($request->route('id'));
        return $this->view('zipcode.list')->with($data);
    }

}
