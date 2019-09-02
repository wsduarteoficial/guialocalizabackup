<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\Category\CategoryRepository;
use Illuminate\Http\Request;

/**
 * Class CategoryAjaxController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class CategoryAjaxController extends BaseController
{
    /**
     * @var CategoryRepository
     */
    private $repository;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function active(Request $request)
    {

        $data = $this->repository->getCategoryActiveAll();
        return response()->json($data);

    }

    /**
     * Register category
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {

        $array = ['name' => $request->get('name')];

        if ($this->repository->whereExists($array)) {
            return response()->json(
                [
                    'exists' => true,
                    'name' => $request->get('name')
                ]
            );
        }

        $result = $this->repository->create($request->all());
        if ($result) {
            return response()->json($result);
        }
        return response()->json([]);

    }

    /**
     * Edit category
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {

        $array = ['name' => $request->get('name')];

        if ($this->repository->whereExists($array)) {
            return response()->json(
                [
                    'exists' => true,
                    'name' => $request->get('name')
                ]
            );
        }

        $result = $this->repository
            ->update($request->all(),$request->get('category_id'));

        if($result)
            return response()->json($request->all());
        return response()->json([]);

    }

    /**
     * Remove Category
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


}
