<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\Subcategory\SubcategoryRepository;
use Illuminate\Http\Request;

/**
 * Class SubcategoryAjaxController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class SubcategoryAjaxController extends BaseController
{
    
    /**
     * @var SubcategoryRepository
     */
    private $repository;

    /**
     * SubcategoryController constructor.
     * @param SubcategoryRepository $repository
     */
    public function __construct(SubcategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function active(Request $request)
    {

        $data = $this->repository->all(true);
        return response()->json($data);
        
    }

    /**
     * Register subcategory
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {

        $array = [
            'name' => $request->get('name'),
            'category_id' => $request->get('category_id'),
        ];

        if ($this->repository->whereExists($array)) {
            return response()->json(
                [
                    'exists' => true,
                    'name' => $request->get('name')
                ]
            );
        }

        $result = $this->repository->create($request->all());

        if ($result)
            return response()->json($result);
        return response()->json([]);

    }

    /**
     * Edit Subcategory
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {

        $array = [
            'name' => $request->get('name'),
            'category_id' => $request->get('category_id')
        ];

        if ($this->repository->whereExists($array)) {
            return response()->json(
                [
                    'exists' => true,
                    'name' => $request->get('name')
                ]
            );
        }

        $result = $this->repository
            ->update($request->all(),$request->get('subcategory_id'));

        if($result)
            return response()->json($request->all());
        return response()->json([]);

    }

    /**
     * Remove Subcategory
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove(Request $request)
    {

        $total = $this->repository->existsCompanies($request->get('id'));

        if ($total > 0 ) {
            return response()->json([
                'exists' => true,
                'total' => $total
            ]);
        }

        $result = $this->repository->delete($request->get('id'));
        if($result)
            return response()->json($request->all());
        return response()->json([]);

    }

    public function getListSubcategoriesPerCategoryId(Request $request)
    {
        sleep(2);
        $result = $this->repository->subcategoriesPerCategoryId($request->get('id'));
        if($result)
            return response()->json($result);
        return response()->json([]);
    }

}