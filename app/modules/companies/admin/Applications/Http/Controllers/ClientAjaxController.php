<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\Client\ClientRepository;
use Illuminate\Http\Request;

/**
 * Class ClientAjaxController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class ClientAjaxController extends BaseController
{
    
    /**
     * @var ClientRepository
     */
    private $repository;


    /**
     * ClientAjaxController constructor.
     * @param ClientRepository $repository
     */
    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function cpfCnpj(Request $request)
    {
        return response()
                ->json($this->repository->filterPerCpfCnpj($request->get('number')));
    }

     /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function email(Request $request)
    {

        $data = [
            'email' => $request->get('email'),
            'cpf_cnpj' => $request->get('cpf_cnpj')
        ];

        return response()
                ->json($this->repository->verifyRegisteredExistsEmail($data));
    }

}
