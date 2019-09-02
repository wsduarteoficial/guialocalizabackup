<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\City\CityRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Zipcode\ZipcodeRepository;
use Illuminate\Http\Request;
use Validator;

/**
 * Class ZipcodeAjaxController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class ZipcodeAjaxController extends BaseController
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
    public function __construct(ZipcodeRepository $repository,
                                CityRepository $cityRepository)
    {
        $this->repository = $repository;
        $this->cityRepository = $cityRepository;
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
     * Register Zipcode
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {

        $this->isValid($request);

        if ($this->repository
            ->whereExists(['code' => $request->get('code')])) {
            return response()->json([
                'exists' => true, 'code' => $request->get('code')
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
     * Edit Zipcode
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request)
    {

        $this->isValid($request);

        $data = [
            'zipcode_id' => $request->get('zipcode_id'),            
            'code' => $request->get('code'), 
            'city_id' => $request->get('city_id'),
        ];

        if ( $this->repository->isExists( $data ) === true ) {
            return response()->json([
                'exists' => true, 'code' => $request->get('code')
            ]);
        }

        $result = $this->repository->find($request->get('zipcode_id'))
                    ->update($request->all());
        if($result)
            return response()->json($request->all());
        return response()->json([]);
    }

    /**
     * Remove Zipcode
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
            'code' => "required",
            'city_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([]);
        }

    }

}
