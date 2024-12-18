<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseChore extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id',
        'property_id',
        'date',
        'expected_date_to_complete',
        'name',
        'description',
        'task_type',
        'comments',
        'cleaner_booked',
        'status',
        'created_by',
        'last_updated_by',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class,'property_id','id');
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id','id');
    }
   
}
