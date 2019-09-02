<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Site\Applications\Http\Services\CompanyAdsRedirectService;
use Illuminate\Http\Request;

/**
 * Class AdsController
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class AdsController extends BaseController
{
    /**
     * @var CompanyAdsRedirectService
     */
    private $service;

    /**
     * AdsController constructor.
     * @param CompanyAdsRedirectService $service
     */
    public function __construct(CompanyAdsRedirectService $service)
    {
        $this->service = $service;
    }

    public function redirect(Request $request)
    {
        return $this->service->redirectAfterClick($request);
    }

}