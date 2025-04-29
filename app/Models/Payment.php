<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'user_id',
        'amount',
        'stripe_payment_id',
        'status',
    ];

    public const PAYMENT_STATUS_PENDING   = 'pending';
    public const PAYMENT_STATUS_SUCCESS   = 'success';
    public const PAYMENT_STATUS_FAILED    = 'failed';
    public const PAYMENT_STATUS_CANCELLED = 'cancelled';
    public const PAYMENT_STATUS_REFUNDED  = 'refunded';
    public const PAYMENT_STATUS_PARTIAL   = 'partial';

    public static function paymentStatusList(): array
    {
        return [
            self::PAYMENT_STATUS_PENDING   => 'Pending',
            self::PAYMENT_STATUS_SUCCESS   => 'Success',
            self::PAYMENT_STATUS_FAILED    => 'Failed',
            self::PAYMENT_STATUS_CANCELLED => 'Cancelled',
            self::PAYMENT_STATUS_REFUNDED  => 'Refunded',
            self::PAYMENT_STATUS_PARTIAL   => 'Partial',
        ];
    }


    // Relationship with Booking
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
