<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use GuiaLocaliza\Http\Controllers\Controller as CoreController;

/**
 * Class BaseController
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class BaseController extends CoreController
{

    /**
     * @var string
     */
    protected $viewNamespace = 'site::';


    /**
     * Rename viewNamespace
     * @param null $view
     * @param array $data
     * @param array $mergeData
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function view($view = null, $data = [], $mergeData = [])
    {

        if (!empty($this->viewNamespace) && !str_contains($view, '::')) {
            $view = $this->viewNamespace . $view;
        }

        return view($view, $data, $mergeData);
    }

}
