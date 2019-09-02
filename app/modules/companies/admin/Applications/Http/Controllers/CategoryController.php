<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\Category\CategoryRepository;

/**
 * Class CategoryController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class CategoryController extends BaseController
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
     *
     */
    public function create()
    {

    }

    /**
     * @return $this
     */
    public function listAll()
    {
        
        $data = [];
        $data['categories'] = $this->repository->listAll();
        return $this->view('category.list')->with($data);

    }


}