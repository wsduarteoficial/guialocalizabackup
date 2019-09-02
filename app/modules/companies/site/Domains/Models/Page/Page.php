<?php

namespace GuiaLocaliza\Companies\Site\Domains\Models\Page;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $connection = 'companies';

    protected $fillable = [];

    public function getBodyAttribute($value)
    {
        return tools_htmlentities_decode_UTF8($value);
    }


}
