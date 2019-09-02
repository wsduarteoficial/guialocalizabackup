<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Domains\Models\State\StateRepository;

/**
 * Class StateController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class StateController extends BaseController
{

    /**
     * @var StateRepository
     */
    private $repository;

    /**
     * StateController constructor.
     * @param StateRepository $repository
     */
    public function __construct(StateRepository $repository)
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

        $data['states'] = $this->repository->listAll();
        return $this->view('state.list')->with($data);

    }


}