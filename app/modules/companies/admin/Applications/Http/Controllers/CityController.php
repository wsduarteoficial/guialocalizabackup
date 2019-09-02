<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\City\CityRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\State\StateRepository;
use Illuminate\Http\Request;

/**
 * Class CityController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class CityController extends BaseController
{

    /**
     * @var CityRepository
     */
    private $repository;

    /**
     * @var StateRepository
     */
    private $stateRepository;

    /**
     * CityController constructor.
     * @param CityRepository $repository
     * @param StateRepository $stateRepository
     */
    public function __construct(CityRepository $repository, StateRepository $stateRepository)
    {
        $this->repository = $repository;
        $this->stateRepository = $stateRepository;
    }

    /**
     * List Data
     * @param Request $request
     * @return $this
     */
    public function listAll(Request $request)
    {


        $data = [];

        $route_id = $request->route('id');

        $route_id = $route_id > 0 ? $route_id : 51;

        $data['state'] = $this->stateRepository->find($route_id);
        $data['cities'] = $this->repository->listAll($route_id);
        return $this->view('city.list')->with($data);

    }

}
