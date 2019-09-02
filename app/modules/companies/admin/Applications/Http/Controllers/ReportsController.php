<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\Category\CategoryRepository;

/**
 * Class ReportsController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class ReportsController extends BaseController
{

    /**
     * @var CategoryRepository
     */
    private $repository;

    /**
     * ReportsController constructor.
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return $this
     */
    public function listAll()
    {

        $data = [];
        //$data['categories'] = $this->repository->listAll();
        return $this->view('report.results.list')->with($data);

    }

}
