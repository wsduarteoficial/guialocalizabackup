<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\City\CityRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\State\StateRepository;
use Illuminate\Http\Request;

/**
 * Class StateAjaxController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class StateAjaxController extends BaseController
{
    
    /**
     * @var StateRepository
     */
    private $repository;
    /**
     * @var CityRepository
     */
    private $cityRepository;

    /**
     * StateController constructor.
     * @param StateRepository $repository
     * @param CityRepository $cityRepository
     */
    public function __construct(StateRepository $repository, CityRepository $cityRepository)
    {
        $this->repository = $repository;
        $this->cityRepository = $cityRepository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function active()
    {
        return response()->json($this->repository->stateActive());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(Request $request)
    {

        $this->repository->update(
            ['active' => $request->get('active')],
            $request->get('id')
        );

        return response()->json($request->all());
        
    }

}