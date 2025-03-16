<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'room_id',
        'start_date',
        'end_date',
        'status',
    ];

    // Relationship with Room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
