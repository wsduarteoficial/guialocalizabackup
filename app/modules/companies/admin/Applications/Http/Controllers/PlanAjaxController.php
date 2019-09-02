<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\Plan\PlanRepository;
use Illuminate\Http\Request;

/**
 * Class PlanAjaxController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class PlanAjaxController extends BaseController
{
    
    /**
     * @var PlanRepository
     */
    private $repository;

    /**
     * PlanController constructor.
     * @param PlanRepository $repository
     */
    public function __construct(PlanRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function active(Request $request)
    {
        $data = $this->repository->getPlansActiveAll();
        return response()->json($data);
        
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

    /**
     * Register District
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $result = $this->repository->create($request->all());
        if($result) {
            $state = $this->stateRepository->find($result->state_id);
            $result['name_state'] = $state->name;
            $result['route_District'] = route('admin.cities.all', $result->id);
            return response()->json($result);
        }
        return response()->json([]);

    }

    /**
     * Edit District
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request)
    {
        $result = $this->repository->find($request->get('District_id'))
                    ->update($request->all());
        if($result)
            return response()->json($request->all());
        return response()->json([]);
    }

    /**
     * Remove District
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove(Request $request)
    {
        $result = $this->repository->delete($request->get('id'));
        if($result)
            return response()->json($result);
        return response()->json([]);
    }

}
