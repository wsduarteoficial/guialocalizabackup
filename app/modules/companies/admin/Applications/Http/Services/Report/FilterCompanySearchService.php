<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Services\Report;

use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Log\EloquentLogSearchRepository;
use Illuminate\Http\Request;

/**
 * Class FilterCompanySearchService
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Services\Report
 * @author Williams Duarte <https://github.com/williamsduarte>
 * File: FilterCompanySearchService
 */
class FilterCompanySearchService
{
    /**
     * @var EloquentCompanyRepository
     */
    private $repository;

    /**
     * FilterCompanySearchService constructor.
     * @param EloquentLogSearchRepository $repository
     */
    public function __construct(EloquentLogSearchRepository $repository)
    {
        $this->repository = $repository;
    }

    public function make(Request $request)
    {
        $data = [
            'date_start' => $request->get('date_start'),
            'date_end' => $request->get('date_end'),
            'state_id' => $request->get('state'),
            'city_id' => $request->get('city')
        ];
        return $this->repository->logs($data);

    }
}
