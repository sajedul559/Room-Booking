<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantRent extends Model
{
    use HasFactory;

    protected $fillable = [
      'vendor_id',
      'user_id',
      'amount',
      'paid_amount',
      'status',
      'due_date',
      'created_by',
      'last_updated_by',
  ];

    public function vendor()
    {
       return $this->belongsTo(Vendor::class,'vendor_id','id');
    }

    public function user()
    {
       return $this->belongsTo(user::class,'user_id','id');
    }

    public function tenantPayments() {
        return $this->hasMany(TenantRentPayment::class);
    }

    public function createdBy()
    {
       return $this->belongsTo(user::class,'created_by','id');
    }
    public function updatedBy()
    {
       return $this->belongsTo(user::class,'last_updated_by','id');
    }
}
