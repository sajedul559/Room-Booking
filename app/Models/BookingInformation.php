<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id', 'name', 'phone', 'email', 'address', 'comments'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
