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

    public function vendor()
    {
       return $this->belongsTo(Vendor::class,'vendor_id','id');
    }
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function user()
    {
       return $this->belongsTo(user::class,'user_id','id');
    }
    public function createdBy()
    {
       return $this->belongsTo(user::class,'created_by','id');
    }
    public function updatedBy()
    {
       return $this->belongsTo(user::class,'last_updated_by','id');
    }
    public function paymentCollecteddBy()
    {
       return $this->belongsTo(user::class,'payment_collect_by','id');
    }
}
