<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\Phone\PhoneRepository;
use Illuminate\Http\Request;

/**
 * Class PhoneAjaxController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class PhoneAjaxController extends BaseController
{
    
    /**
     * @var PhoneRepository
     */
    private $repository;

    /**
     * PhoneAjaxController constructor.
     * @param PhoneRepository $repository
     */
    public function __construct(PhoneRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function existsNumber(Request $request)
    {
        $res = $this->repository->existsNumber([
                'company_id' => $request->get('company_id'),
                'number' => $request->get('number')               
            ]);
            
        return response()->json( $res );
    }

    /**
     * @param Request $request
     */
    public function removeItem(Request $request)
    {
        $res = $this->repository->delete($request->get('phone_id'));

        if($res) {
            return response()->json(['removed' => true ]) ;
        }

        return response()->json(['removed' => false ]) ;

    }

}