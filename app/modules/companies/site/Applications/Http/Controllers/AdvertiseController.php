<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Controllers;

class AdvertiseController extends BaseController
{

    public function advertise()
    {
        return redirect()->away('https://mkt.guialocaliza.com.br/?utm_source=guialocaliza&utm_medium=button&utm_campaign=advertise');
    }


    public function advertiseFree()
    {
        return redirect()->away('https://mkt.guialocaliza.com.br/?utm_source=guialocaliza&utm_medium=button_top&utm_campaign=advertise-free');
    }

}
