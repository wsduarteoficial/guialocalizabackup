<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\Company\CompanyRepository;
use Illuminate\Http\Request;

/**
 * Class CompanyAjaxController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class CompanyAjaxController extends BaseController
{
    /**
     * @var CompanyRepository
     */
    private $repository;

    /**
     * CompanyController constructor.
     * @param CompanyRepository $repository
     */
    public function __construct(CompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function active(Request $request)
    {

        $this->repository->update(
            ['active' => $request->get('active')],
            $request->get('id')
        );

        return response()->json($request->all());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove(Request $request)
    {

        $return = $this->repository->delete($request->get('id'));

        return response()->json(['success' => $return]);
    }

}
