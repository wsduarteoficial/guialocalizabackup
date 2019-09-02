<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\Page\PageRepository;
use Illuminate\Http\Request;
use Validator;

/**
 * Class PageAjaxController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class PageAjaxController extends BaseController
{

    /**
     * @var PageRepository
     */
    private $repository;

    /**
     * PageAjaxController constructor.
     * @param PageRepository $repository
     */
    public function __construct(PageRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Update Status
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(Request $request)
    {

        $this->repository->update(
            ['active' => $request->get('active')],
            $request->get('id')
        );

        return response()->json($request->all());
    }

    /**
     * Remove Page
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove(Request $request)
    {
        if( $request->get('id') <= 1 ) {
            return response()->json([]);
        }

        $result = $this->repository->delete($request->get('id'));
        if($result)
            return response()->json($result);
        return response()->json([]);
    }

}
