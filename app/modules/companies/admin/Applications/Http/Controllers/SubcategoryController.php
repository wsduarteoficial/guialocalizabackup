<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\Subcategory\SubcategoryRepository;

/**
 * Class SubcategoryController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class SubcategoryController extends BaseController
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


    }


}