<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Services\Home;
use GuiaLocaliza\Companies\Admin\Domains\Models\PlanContract\PlanContractRepository;

/**
 * Class DisplayClientService
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Services\Home
 * @author Williams Duarte <https://github.com/williamsduarte>
 * Date: 19/08/17
 * File: DisplayClientService.php
 */
class DisplayClientContractService
{
    /**
     * @var PlanContractRepository
     */
    private $repository;

    /**
     * DisplayClientContractService constructor.
     * @param PlanContractRepository $repository
     */
    public function __construct(PlanContractRepository $repository)
    {
        $this->repository = $repository;
    }

    public function make()
    {
        $data = [];
        $data['plans'] = tools_convert_to_decimal_br(1000000,0);
        return $data;
    }

}

