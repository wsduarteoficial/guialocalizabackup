<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Applications\Http\Services\Report\FilterCompanyPerPlanService;
use GuiaLocaliza\Companies\Admin\Domains\Models\Plan\PlanRepository;
use Illuminate\Http\Request;

/**
 * Class ReportPlansController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class ReportPlansController extends BaseController
{
    /**
     * @var FilterCompanyPerPlanService
     */
    private $service;
    /**
     * @var PlanRepository
     */
    private $repository;


    /**
     * ReportPlansController constructor.
     * @param PlanRepository $repository
     * @param FilterCompanyPerPlanService $service
     */
    public function __construct(PlanRepository $repository,
                                FilterCompanyPerPlanService $service)
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    /**
     * @return $this
     */
    public function filter()
    {
        return $this->view('report.filters.company-plans');
    }

    public function report(Request $request)
    {
        $data = [];
        $data['companies'] = $this->service->make($request);
        $data['plan'] = $this->repository->find($request->get('plan'));
        return $this->view('report.results.company-plans')->with($data);
    }

}
