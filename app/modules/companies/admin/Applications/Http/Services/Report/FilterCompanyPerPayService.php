<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Services\Report;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Company\EloquentCompanyRepository;
use Illuminate\Http\Request;

/**
 * Class FilterCompanyPerPayService
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Services\Report
 * @author Williams Duarte <https://github.com/williamsduarte>
 * Date: 28/09/17
 * File: FilterCompanyPerPayService.php
 */
class FilterCompanyPerPayService
{
    /**
     * @var EloquentCompanyRepository
     */
    private $repository;

    /**
     * FilterCompanyPerPayService constructor.
     * @param EloquentCompanyRepository $repository
     */
    public function __construct(EloquentCompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function make(Request $request)
    {

        $data = [
            'date_start' => $request->get('date_start'),
            'date_end' => $request->get('date_end'),
            'active' => $request->get('active'),
            'plan_id' => $request->get('plan'),
            'state_id' => $request->get('state'),
            'city_id' => $request->get('city')
        ];

        return $this->repository->listPaymentOrderByNameAsc($data);

    }
}
