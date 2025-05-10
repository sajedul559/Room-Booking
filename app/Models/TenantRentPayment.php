<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantRentPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'rent_id',
        'payment_id',
        'paid_amount',
    ];

    public function tenantRent()
    {
        return $this->belongsTo(TenantRent::class, 'rent_id');
    }

    public function tenantPayment()
    {
        return $this->belongsTo(TenantPayment::class, 'payment_id');
    }
}
