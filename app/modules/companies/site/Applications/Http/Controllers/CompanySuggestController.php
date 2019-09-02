<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Site\Applications\Http\Services\CompanySuggestService;
use Illuminate\Http\Request;

/**
 * Class CompanySuggestController
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class CompanySuggestController extends BaseController
{
    /**
     * @var CompanySuggestService
     */
    private $service;

    /**
     * CompanySuggestController constructor.
     * @param CompanySuggestService $service
     */
    public function __construct(CompanySuggestService $service)
    {
        $this->service = $service;
    }

    /**
     * Search data in Service
     * @param Request $request
     */
    public function search(Request $request)
    {
        echo $this->service->search($request);
    }

}
