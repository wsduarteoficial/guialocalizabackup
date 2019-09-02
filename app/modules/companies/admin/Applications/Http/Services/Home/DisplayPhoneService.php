<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Services\Home;

/**
 * Class DisplayPhoneService
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Services\Home
 * @author Williams Duarte <https://github.com/williamsduarte>
 * Date: 19/08/17
 * File: DisplayPhoneService.php
 */
class DisplayPhoneService
{
    public function __construct()
    {

    }

    public function make()
    {
        $data = [];
        $data['phone'] =5000000;
        return $data;
    }
}

