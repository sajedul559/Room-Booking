<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIdentity extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'booking_id',
        'document_type',
        'point',
        'image_path',
        
    ];
}
