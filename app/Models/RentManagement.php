<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentManagement extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id',
        'property_id',
        'room_id',
        'amount',
        'date',
        'user_id',
        'last_updated_by',
        'payment_type',
        'payment_collection_type',
        'payment_collect_by',
        'created_by',
        'notes',
    ];
}
