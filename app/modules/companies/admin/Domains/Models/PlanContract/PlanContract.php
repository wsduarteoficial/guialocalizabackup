<?php

namespace GuiaLocaliza\Companies\Admin\Domains\Models\PlanContract;

use GuiaLocaliza\Companies\Admin\Domains\Models\Client\Client;
use Illuminate\Database\Eloquent\Model;

class PlanContract extends Model
{

    protected $connection = 'companies';

    protected $fillable = [
        'client_id',
        'coupon_id',
        'company_id',
        'plan_id',
        'configuration_payment_id',
        'situation_payment_id',
        'transaction_code',
        'discount',
        'discount_type',
        'payment_value',
        'note',
        'active',
        'paymented_at',
        'start_at',
        'expired_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
