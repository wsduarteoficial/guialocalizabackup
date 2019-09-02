<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Site\Applications\Http\Services\CompanyAdsRelatedService;
use Illuminate\Http\Request;

/**
 * Class CompanyAdsRelatedController
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class CompanyAdsRelatedController extends BaseController
{

    private $service;

    /**
     * CompanyAdsRelatedController constructor.
     * @param CompanyAdsRelatedService $service
     */
    public function __construct(CompanyAdsRelatedService $service)
    {
        $this->service = $service;
    }

    public function makeAds(Request $request)
    {
        $result = $this->service->makeAdsRelated($request);
        if ($result !== false) {
            return response()->json($result, 200);
        }
        return response()->json([], 200);

    }

}
