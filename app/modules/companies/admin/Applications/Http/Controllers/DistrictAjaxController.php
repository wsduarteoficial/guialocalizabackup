<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Applications\Http\Services\Suggest\GenericSuggestService;
use GuiaLocaliza\Companies\Admin\Domains\Models\District\DistrictRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\City\CityRepository;
use Illuminate\Http\Request;
use Validator;

/**
 * Class DistrictAjaxController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class DistrictAjaxController extends BaseController
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
     * @var GenericSuggestService
     */
    private $genericSuggestService;

    /**
     * DistrictController constructor.
     * @param DistrictRepository $repository
     * @param CityRepository $cityRepository
     * @param GenericSuggestService $genericSuggestService
     */
    public function __construct(DistrictRepository $repository,
                                CityRepository $cityRepository,
                                GenericSuggestService $genericSuggestService)
    {
        $this->repository = $repository;
        $this->cityRepository = $cityRepository;
        $this->genericSuggestService = $genericSuggestService;
    }

    /**
     * Update Status  
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

        $this->isValid($request);

        if ($this->repository
            ->whereExists(['name' => $request->get('name'), 'city_id' => $request->get('city_id')])) {
            return response()->json([
                'exists' => true, 'name' => $request->get('name')
            ]);
        }

        $result = $this->repository->create($request->all());

        if($result) {

            $city = $this->cityRepository->findCityWithState($request->get('city_id'));
            $result['city_state'] = $city->name . '-'. $city->state->abbr;
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

        $this->isValid($request);

        $data = [
            'district_id' => $request->get('district_id'),            
            'name' => $request->get('name'), 
            'city_id' => $request->get('city_id'),
        ];

        if ( $this->repository->isExists( $data ) === true ) {
            return response()->json([
                'exists' => true, 'name' => $request->get('name')
            ]);
        }

        $result = $this->repository->find($request->get('district_id'))
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

    private function isValid($request)
    {
        
        $validator = Validator::make($request->all(), [
            'code' => 'required|min:8',
            'city_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([]);
        }

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getByIdCityAll(Request $request)
    {

        $data = [];
        $data['city_id'] = $request->get('city_id');
        $data['query'] = $request->get('query');

        $results = $this->repository->filterQueryPerLikeAndCityAll($data);
        return $this->genericSuggestService->make($results);

    }

}
