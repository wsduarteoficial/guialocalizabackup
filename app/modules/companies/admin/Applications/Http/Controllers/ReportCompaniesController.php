<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Applications\Http\Services\Report\FilterCompanyPerOrderByNameAscService;
use GuiaLocaliza\Companies\Admin\Applications\Http\Services\Report\FilterCompanyOrderByPhoneAscService;
use GuiaLocaliza\Companies\Admin\Domains\Models\Plan\PlanRepository;
use Illuminate\Http\Request;

/**
 * Class ReportCompaniesController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class ReportCompaniesController extends BaseController
{
    /**
     * @var FilterCompanyPerOrderByNameAscService
     */
    private $serviceCompany;

    /**
     * @var FilterCompanyOrderByPhoneAscService
     */
    private $servicePhone;

    /**
     * @var PlanRepository
     */
    private $repository;


    /**
     * ReportCompaniesController constructor.
     * @param PlanRepository $repository
     * @param FilterCompanyPerOrderByNameAscService $serviceCompany
     */
    public function __construct(PlanRepository $repository,
                                FilterCompanyPerOrderByNameAscService $serviceCompany,
                                FilterCompanyOrderByPhoneAscService $servicePhone)
    {
        $this->serviceCompany = $serviceCompany;
        $this->servicePhone = $servicePhone;
        $this->repository = $repository;
    }

    /**
     * @return $this
     */
    public function filter()
    {
        return $this->view('report.filters.company');
    }

    public function report(Request $request)
    {

        $data = [];

        $data['plan'] = $this->repository->find($request->get('plan'));

        if ($request->get('order') === 'name') {
            $data['companies'] = $this->serviceCompany->make($request);
            return $this->view('report.results.company-orderby-name')->with($data);
        }

        $data['phones'] = $this->servicePhone->make($request);
        return $this->view('report.results.company-orderby-phone')->with($data);

    }

}
