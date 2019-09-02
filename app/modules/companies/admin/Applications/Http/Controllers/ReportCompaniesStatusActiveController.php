<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Applications\Http\Services\Report\FilterCompanyPerStatusService;
use GuiaLocaliza\Companies\Admin\Domains\Models\Plan\PlanRepository;
use Illuminate\Http\Request;

/**
 * Class ReportCompaniesStatusActiveController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class ReportCompaniesStatusActiveController extends BaseController
{

    /**
     * @var FilterCompanyPerStatusService
     */
    private $service;

    /**
     * @var PlanRepository
     */
    private $repository;


    /**
     * ReportCompaniesStatusActiveController constructor.
     * @param PlanRepository $repository
     * @param FilterCompanyPerStatusService $service
     */
    public function __construct(PlanRepository $repository,
                                FilterCompanyPerStatusService $service)
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    /**
     * @return $this
     */
    public function filter()
    {
        return $this->view('report.filters.company-status-active');
    }

    public function report(Request $request)
    {

        $data = [];
        $data['plan'] = $this->repository->find($request->get('plan'));
        $data['active'] = $request->get('active');
        $data['companies'] = $this->service->make($request);
        return $this->view('report.results.company-status-active')->with($data);

    }

}
