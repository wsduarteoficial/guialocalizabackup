<?php

namespace GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Client;

use GuiaLocaliza\Companies\Admin\Domains\Models\Client\Client;
use GuiaLocaliza\Companies\Admin\Domains\Models\Client\ClientRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Persistences\Eloquent\BaseEloquentAbstractRepository;

/**
 * Class EloquentClientRepository
 * @package GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Client
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class EloquentClientRepository extends BaseEloquentAbstractRepository implements ClientRepository
{

    /**
     * EloquentClientRepository constructor.
     * @param Client $model
     */
    public function __construct(Client $model)
    {
        parent::__construct($model);
    }

    public function filterPerCpfCnpj($number)
    {
        return $this->model->where('cpf_cnpj', $number)->first();
    }
    
    public function existsCpfCnpj($number)
    {
        return $this->model->where('cpf_cnpj', $number)->exists();
    }

    public function verifyRegisteredExistsEmail(array $data)
    {

        if(isset($data['email'], $data['cpf_cnpj'])) {

            $query = $this->model->where('cpf_cnpj', '!=', $data['cpf_cnpj']);;
            
            $query->where(function ($q) use($data) {
                $q->where('email_primary', '=', $data['email'])
                  ->orWhere('email_secondary', '=', $data['email']);
            })->first();

            return $query;

        }

        return $this->model->where(function ($query) use($data) {
            $query->where('email_primary', '=', $data['email'])
                  ->orWhere('email_secondary', '=', $data['email']);
        })->first();
       
        
    }

}
