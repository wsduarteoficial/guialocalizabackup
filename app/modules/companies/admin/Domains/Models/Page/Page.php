<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\Page;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $connection = 'companies';

    protected $fillable = ['title', 'slug', 'body', 'active'];


    public function setBodyAttribute($value)
    {
        $this->attributes['body'] = tools_htmlentities_UTF8($value);
    }

    public function getBodyAttribute($value)
    {
        return tools_htmlentities_decode_UTF8($value);
    }


    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
