<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Applications\Http\Services\Report\FilterCompanySearchService;
use Illuminate\Http\Request;

/**
 * Class ReportCompaniesSearchController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class ReportCompaniesSearchController extends BaseController
{
    /**
     * @var FilterCompanySearchService
     */
    private $service;

    /**
     * ReportCompaniesSearchController constructor.
     * @param FilterCompanySearchService $service
     */
    public function __construct(FilterCompanySearchService $service)
    {
        $this->service = $service;
    }

    /**
     * @return $this
     */
    public function filter()
    {
        return $this->view('report.filters.company-search');
    }

    public function report(Request $request)
    {

        $data = [];
        $data['active'] = $request->get('active');
        $data['date_start'] = $request->get('date_start');
        $data['date_end'] = $request->get('date_end');
        $data['logs'] = $this->service->make($request);
        return $this->view('report.results.company-search')->with($data);

    }

}
