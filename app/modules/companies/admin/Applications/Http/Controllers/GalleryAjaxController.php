<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\Gallery\GalleryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


/**
 * Class GalleryAjaxController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class GalleryAjaxController extends BaseController
{
    
    /**
     * @var GalleryRepository
     */
    private $repository;


    /**
     * GalleryAjaxController constructor.
     * @param GalleryRepository $repository
     */
    public function __construct(GalleryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeItem(Request $request)
    {

        $data = $this->repository->find($request->get('id'));

        $pathImage = sprintf('public/uploads/companies/%d/photos/%s', 
            $data->company_id, 
            $data->image
        );       

        Storage::delete( $pathImage );

        if ($this->repository->delete( $data->id )) {
            return response()
                ->json([
                    'id' => $request->get('id')
                ]);
        }

        return response()->json([]);
        
    }

}