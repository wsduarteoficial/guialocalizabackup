<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Client;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $connection = 'companies';

    protected $fillable = [
        'cpf_cnpj',
        'company_name',
        'contracting_name',
        'phone',
        'email_primary',
        'email_secondary',
        'active'
    ];    

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
