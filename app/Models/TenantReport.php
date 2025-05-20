<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id',
        'user_id',
        'property_id',
        'report_details',
        'status',
        'created_by',
        'last_updated_by',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function lastUpdatedBy()
    {
        return $this->belongsTo(User::class, 'last_updated_by');
    }
    public function user()
    {
       return $this->belongsTo(user::class,'user_id','id');
    }
}
