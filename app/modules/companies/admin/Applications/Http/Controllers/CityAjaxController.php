<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\City\CityRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\State\StateRepository;
use Illuminate\Http\Request;
use Validator;

/**
 * Class CityAjaxController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class CityAjaxController extends BaseController
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
    public function __construct(CityRepository $repository,
                                StateRepository $stateRepository)
    {
        $this->repository = $repository;
        $this->stateRepository = $stateRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function active(Request $request)
    {
        sleep(2);
        $data = $this->repository->getCityActivePerStateId($request->get('state_id'));
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
     * Register City
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {

        $this->isValid($request);

        if ($this->repository
            ->whereExists(['name' => $request->get('name'),
                'state_id' => $request->get('state_id')])) {
            return response()->json(['exists' => true, 'name' => $request->get('name')]);
        }

        $result = $this->repository->create($request->all());

        if($result) {
            $state = $this->stateRepository->find($result->state_id);
            $result['name_state'] = $state->name;
            $result['route_city'] = route('admin.cities.all', $result->id);
            return response()->json($result);
        }

        return response()->json([]);

    }

    /**
     * Edit City
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request)
    {

        $this->isValid($request);

        if ($this->repository
            ->whereExists(['name' => $request->get('name'), 'state_id' => $request->get('state_id')])) {
            return response()->json([
                'exists' => true, 'name' => $request->get('name')
            ]);
        }

        $result = $this->repository
            ->update($request->all(), $request->get('city_id'));

        if($result)
            return response()->json($request->all());
        return response()->json([]);

    }

    /**
     * Remove City
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


    private function isValid($request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'state_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([]);
        }

    }

}
