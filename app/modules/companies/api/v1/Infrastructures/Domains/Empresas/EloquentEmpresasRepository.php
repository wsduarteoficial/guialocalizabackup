<?php

namespace GuiaLocaliza\Companies\Api\v1\Infrastructures\Domains\Empresas;

use GuiaLocaliza\Companies\Api\v1\Domains\Models\Empresas\Empresas;
use GuiaLocaliza\Companies\Api\v1\Domains\Models\Empresas\EmpresasRepository;

/**
 * Class EloquentEmpresasRepository
 * @package GuiaLocaliza\Companies\Api\v1\Infrastructures\Domains\Empresas
 */
class EloquentEmpresasRepository implements EmpresasRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Empresas::class;
    }

}
