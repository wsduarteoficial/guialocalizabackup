<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Applications\Http\Services\Company\ApiAddressService;
use Illuminate\Http\Request;

/**
 * Class ApiAddressAjaxController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class ApiAddressAjaxController extends BaseController
{
    /**
     * @var ApiAddressService
     */
    private $service;

    /**
     * ApiAddressAjaxController constructor.
     * @param ApiAddressService $service
     */
    public function __construct(ApiAddressService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function zipCode(Request $request)
    {
        return $this->service->address($request);
    }

}
