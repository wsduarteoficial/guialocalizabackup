<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Services\Report;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Company\EloquentCompanyRepository;
use Illuminate\Http\Request;

/**
 * Class FilterCompanyPerStatusService
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Services\Report
 * @author Williams Duarte <https://github.com/williamsduarte>
 * Date: 28/09/17
 * File: FilterCompanyPerStatusService.php
 */
class FilterCompanyPerStatusService
{
    /**
     * @var EloquentCompanyRepository
     */
    private $repository;

    /**
     * FilterCompanyPerStatusService constructor.
     * @param EloquentCompanyRepository $repository
     */
    public function __construct(EloquentCompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function make(Request $request)
    {
        $data = [
            'active' => $request->get('active'),
            'plan_id' => $request->get('plan'),
            'state_id' => $request->get('state'),
            'city_id' => $request->get('city')
        ];

        return $this->repository->listOrderByNameAsc($data);

    }
}
