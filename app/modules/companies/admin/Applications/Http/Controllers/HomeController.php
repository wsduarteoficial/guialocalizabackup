<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Applications\Http\Services\Home\DisplayClientContractService;
use GuiaLocaliza\Companies\Admin\Applications\Http\Services\Home\DisplayCompanyService;
use GuiaLocaliza\Companies\Admin\Applications\Http\Services\Home\DisplayPhoneService;

/**
 * Class HomeController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class HomeController extends BaseController
{
    /**
     * @var DisplayCompanyService
     */
    private $displayCompanyService;
    /**
     * @var DisplayClientContractService
     */
    private $displayClientContractService;
    /**
     * @var DisplayPhoneService
     */
    private $displayPhoneService;

    /**
     * HomeController constructor.
     * @param DisplayCompanyService $displayCompanyService
     * @param DisplayClientContractService $displayClientContractService
     * @param DisplayPhoneService $displayPhoneService
     */
    public function __construct(DisplayCompanyService $displayCompanyService,
                                DisplayClientContractService $displayClientContractService,
                                DisplayPhoneService $displayPhoneService)
    {
        $this->displayCompanyService = $displayCompanyService;
        $this->displayClientContractService = $displayClientContractService;
        $this->displayPhoneService = $displayPhoneService;
    }

    /**
     * @return $this
     */
    public function index()
    {
        $data = [];
        $data['display_company'] = $this->displayCompanyService->make();
        $data['display_client'] = $this->displayClientContractService->make();
        $data['display_phone'] = $this->displayPhoneService->make();

        return $this->view('home')->with($data);

    }

}
