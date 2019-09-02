<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\ApiCepAberto;

use GuiaLocaliza\Companies\Admin\Domains\Models\City\City;
use GuiaLocaliza\Companies\Admin\Domains\Models\State\State;
use Illuminate\Database\Eloquent\Model;

class ApiCepAberto extends Model
{

    protected $connection = 'companies';

    protected $table = 'api_cep_aberto';

    protected $fillable = [
        'cep',
        'logradouro',
        'bairro',
        'cidade_id',
        'estado_id',
    ];

    
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function state()
    {
        return $this->belongsTo(State::class, 'estado_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'cidade_id', 'id');
    }

}
