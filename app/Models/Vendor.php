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
        'last_approved_by', 'approved_date', 'last_update_date'
    ];

    protected $casts = [
        'approved_date' => 'datetime',
        'last_update_date' => 'datetime',
    ];

    public const VENDOR_APPROVE = 'Approve';
    public const VENDOR_REJECTED = 'Rejected';
    public const VENDOR_PENDING = 'Pending';

    // Return property types as an associative array
    public static function getVendorStatus(): array
    {
        return [
            self::VENDOR_APPROVE => 'Approve',
            self::VENDOR_REJECTED => 'Rejected',
            self::VENDOR_PENDING => 'Pending',
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
