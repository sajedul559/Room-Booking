<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    // public $incrementing = false; // For UUID
    // protected $keyType = 'string'; // For UUID

    protected $fillable = [
        'id','slug', 'user_id', 'address', 'city', 'state', 'country', 
        'postcode', 'phone', 'email', 'status', 'approved_by', 
        'last_approved_by', 'approved_date', 'last_update_date','id_verification'
    ];

    protected $casts = [
        'approved_date' => 'datetime',
        'last_update_date' => 'datetime',
    ];

    public const VENDOR_STATUS_APPROVE = 'approve';
    public const VENDOR_STATUS_REJECTED = 'rejected';
    public const VENDOR_STATUS_PENDING = 'pending';

    // Return property types as an associative array
    public static function getVendorStatus(): array
    {
        return [
            self::VENDOR_STATUS_APPROVE => 'Approve',
            self::VENDOR_STATUS_REJECTED => 'Rejected',
            self::VENDOR_STATUS_PENDING => 'Pending',
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function lastApprovedBy()
    {
        return $this->belongsTo(User::class, 'last_approved_by');
    }

}
