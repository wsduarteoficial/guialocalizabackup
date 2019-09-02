<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Contact;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $connection = 'companies';

    protected $fillable = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
