<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Services;

use GuiaLocaliza\Companies\Site\Domains\Models\Click\ClickRepository;
use Illuminate\Http\Request;

/**
 * Class InsertClickPhoneService
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Services
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class InsertClickPhoneService
{
    /**
     * @var ClickRepository
     */
    private $repository;

    /**
     * InsertClickService constructor.
     * @param ClickRepository $repository
     */
    public function __construct(ClickRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     */
    public function addClick(Request $request)
    {
        $this->repository->create([
            'company_id' => $request->get('company_id'),
            'phone_id' => $request->get('phone_id'),
            'url' => $request->fullUrl(),
            'ip' =>  $request->ip(),
            'agent' => $request->header('User-Agent'),
        ]);

    }

}
