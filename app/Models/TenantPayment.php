<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'user_id',
        'rent_management_id',
        'amount',
        'payment_date',
        'created_by',
        'last_updated_by',
    ];

    public function vendor()
    {
       return $this->belongsTo(Vendor::class,'vendor_id','id');
    }

    public function user()
    {
       return $this->belongsTo(User::class,'user_id','id');
    }

    public function rentManagementId()
    {
       return $this->belongsTo(RentManagement::class,'rent_management_id','id');
    }

    public function createdBy()
    {
       return $this->belongsTo(user::class,'created_by','id');
    }
    public function updatedBy()
    {
       return $this->belongsTo(user::class,'last_updated_by','id');
    }

    public function tenantRents() {
        return $this->hasMany(TenantRentPayment::class);
    }
}
