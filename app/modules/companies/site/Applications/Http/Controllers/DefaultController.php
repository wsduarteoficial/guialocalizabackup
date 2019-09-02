<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Controllers;

use Illuminate\Contracts\Console\Kernel;

set_time_limit(0); //60 seconds = 1 minute


/**
 * Class DefaultController
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class DefaultController extends BaseController
{

     /**
     * @type \Illuminate\Contracts\Console\Kernel
     */
    private $kernel;


    /**
     * 
     *
     * @param \Illuminate\Contracts\Console\Kernel $kernel
     */
    public function __construct(Kernel $kernel)
    {
        $this->kernel = $kernel;
    }


     /**
     * Seeds the database
     */
    private function seedDatabase()
    {
        $this->kernel->call('db:seed', ['--class' => \GuiaLocaliza\Companies\Site\Infrastructures\Databases\Seeds\DatabaseSeeder::class]);
    }

    /**
     *
     */
    public function index()
    {

        // echo "Inicio Semeando..." .date('H:i:s') . '<br/>';
        // while (true) {
        //     $this->seedDatabase();
        //     sleep(300);  
        // }

        // echo "Fim Semeando..." .date('H:i:s');  

    }

}
