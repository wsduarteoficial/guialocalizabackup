<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Log;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{

	protected $connection = 'companies';

    protected $fillable = [];

		protected $dates = [
        'created_at',
        'updated_at',
    ];

}
