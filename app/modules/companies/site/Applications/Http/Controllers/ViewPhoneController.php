<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Site\Applications\Http\Services\InsertClickPhoneService;
use GuiaLocaliza\Companies\Site\Applications\Http\Services\ViewPhoneNumberService;
use Illuminate\Http\Request;

/**
 * Class ViewPhoneController
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class ViewPhoneController extends BaseController
{

    /**
     * @var ViewPhoneNumberService
     */
    private $service;
    /**
     * @var InsertClickPhoneService
     */
    private $clickPhoneService;

    /**
     * ViewPhoneController constructor.
     * @param ViewPhoneNumberService $service
     * @param InsertClickPhoneService $clickPhoneService
     */
    public function __construct(ViewPhoneNumberService $service, InsertClickPhoneService $clickPhoneService)
    {
        $this->service = $service;
        $this->clickPhoneService = $clickPhoneService;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function viewPhoneNumber(Request $request)
    {
        $this->clickPhoneService->addClick($request);
        return $this->service->viewPhoneNumber($request);
    }

}