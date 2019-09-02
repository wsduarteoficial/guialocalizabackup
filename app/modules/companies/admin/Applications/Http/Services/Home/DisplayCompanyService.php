<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Services\Home;

use GuiaLocaliza\Companies\Admin\Domains\Models\Company\CompanyRepository;

/**
 * Class DisplayService
 * @author Williams Duarte <https://github.com/williamsduarte>
 * Date: 18/08/17
 * File: DisplayService.php
 */
class DisplayCompanyService
{

    /**
     * @var CompanyRepository
     */
    private $repository;

    /**
     * HomeController constructor.
     * @param CompanyRepository $repository
     */
    public function __construct(CompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function make()
    {

        $company_total = $this->repository->count();
        $company_total_active = $this->repository->count(true);
        $company_total_inactive = $this->repository->count(false);

        $data = [];
        $data['company_total'] = tools_convert_to_decimal_br( $company_total, 0 );
        $data['company_total_active'] = tools_convert_to_decimal_br( $company_total_active,0 );
        $data['company_total_inactive'] = tools_convert_to_decimal_br( $company_total_inactive,0 );
        $data['company_percentage_active'] = number_format($company_total_active / $company_total * 100,3);
        $data['company_percentage_inactive'] = number_format($company_total_inactive / $company_total * 100,3);

        return $data;

    }

}

