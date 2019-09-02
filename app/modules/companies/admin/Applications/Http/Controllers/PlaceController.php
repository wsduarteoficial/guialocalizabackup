<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\City\CityRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Place\PlaceRepository;
use Illuminate\Http\Request;

/**
 * Class PlaceController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class PlaceController extends BaseController
{
    
    /**
     * @var PlaceRepository
     */
    private $repository;

    /**
     * @var CityRepository
     */
    private $cityRepository;

    /**
     * PlaceController constructor.
     * @param PlaceRepository $repository
     * @param CityRepository $cityRepository
     */
    public function __construct(PlaceRepository $repository, CityRepository $cityRepository)
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
        $data['places'] = $this->repository->listAll($request->route('id'));
        return $this->view('place.list')->with($data);
    }

}
