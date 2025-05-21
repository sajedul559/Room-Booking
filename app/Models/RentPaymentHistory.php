<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentPaymentHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'user_id',
        'rent_id',
        'payment_id',
        'total_payment_amount',
        'total_rent_paid',
        'payment_date',
        'created_by',
        'last_updated_by',
        'payment_method',
        'payment_status',
        'note',
        'receipt_number',
        'currency',
        'is_partial',
        'due_date',
        'property_address',
        'room_name',
    ];
}
