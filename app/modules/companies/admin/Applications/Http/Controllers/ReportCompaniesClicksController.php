<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Applications\Http\Services\Report\FilterCompanyPerClickService;
use GuiaLocaliza\Companies\Admin\Domains\Models\Plan\PlanRepository;
use Illuminate\Http\Request;

/**
 * Class ReportCompaniesClicksController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class ReportCompaniesClicksController extends BaseController
{

    /**
     * @var FilterCompanyPerClickService
     */
    private $service;

    /**
     * @var PlanRepository
     */
    private $repository;


    /**
     * ReportCompaniesClicksController constructor.
     * @param PlanRepository $repository
     * @param FilterCompanyPerClickService $service
     */
    public function __construct(PlanRepository $repository,
                                FilterCompanyPerClickService $service)
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    /**
     * @return $this
     */
    public function filter()
    {
        return $this->view('report.filters.company-clicks-phone');
    }

    public function report(Request $request)
    {

        $data = [];
        $data['plan'] = $this->repository->find($request->get('plan'));
        $data['active'] = $request->get('active');
        $data['date_start'] = $request->get('date_start');
        $data['date_end'] = $request->get('date_end');
        $data['companies'] = $this->service->make($request);
        return $this->view('report.results.company-clicks-phone')->with($data);

    }

}
