<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'name',
        'slug',
        'capacity',
        'is_available',
        'video_url',
        'video_image',
        'room_image',
        'description',
        'room_furnishings',
        'internet',
        'price',
        'weekly_rent',
        'is_bill_included_rent',
        'bond',
        'available_date',
        'min_length_of_stay',
        'max_length_of_stay',
        'is_smoking_allowed',
        'is_pet_allowed',
        'on_welfare_allowed',
        'created_by',
        'updated_by',
    ];

    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }
    public function property()
    {
        return $this->belongsTo(Property::class,'property_id','id');
    }
}
