<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomReview extends Model
{
    use HasFactory;
    protected $fillable = ['room_id','user_id', 'name', 'email', 'comment', 'star','status'];
     // Status Constants
     const STATUS_PENDING = 'pending';
     const STATUS_CONFIRMED = 'confirmed';
     const STATUS_REJECTED = 'rejected';

}
