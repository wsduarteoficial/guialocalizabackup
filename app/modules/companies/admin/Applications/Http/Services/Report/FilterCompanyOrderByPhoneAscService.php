<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Services\Report;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Phone\EloquentPhoneRepository;
use Illuminate\Http\Request;

/**
 * Class FilterCompanyOrderByPhoneAscService
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Services\Report
 * @author Williams Duarte <https://github.com/williamsduarte>
 * Date: 28/09/17
 * File: FilterCompanyOrderByPhoneAscService.php
 */
class FilterCompanyOrderByPhoneAscService
{
    /**
     * @var EloquentPhoneRepository
     */
    private $repository;

    /**
     * FilterCompanyOrderByPhoneAscService constructor.
     * @param EloquentPhoneRepository $repository
     */
    public function __construct(EloquentPhoneRepository $repository)
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

        return $this->repository->listOrderByPhoneAsc($data);

    }
}
