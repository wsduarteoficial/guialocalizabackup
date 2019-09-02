<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Controllers;

use SEOMeta;
use OpenGraph;
use URL;

/**
 * Class HomeController
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class ErrorController extends BaseController
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function error500()
    {

        $title = 'Error 500';
        $description = 'Error 500';

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        SEOMeta::setCanonical( URL::current() );

        return response()->view('site::companies.modules.errors.500', [], 500);
    }

    public function error404()
    {

        $title = 'Page Not Found';
        $description = 'Page Not Found - Error 404';

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        SEOMeta::setCanonical( URL::current() );

        return response()->view('site::companies.modules.errors.404', [], 404);

    }


}
