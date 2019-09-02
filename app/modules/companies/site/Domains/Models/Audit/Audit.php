<?php

namespace GuiaLocaliza\Companies\Site\Domains\Models\Audit;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{

    protected $connection = 'companies';

    protected $fillable = [];

    public function mode()
    {
        $this->with('ss');
    }

}
