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
        'room_type',
        'room_furnishings',
        'bathroom_type',
        'bed_size',
        'furnishFeatures',
        'tenant_preference',
        'is_women_only',
        'accepting_options',
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
        'is_publish',
        'created_by',
        'updated_by',
    ];

    // Furnished Features
    public const BED_SIDE_TABLE = 'Bed side table';
    public const WARDROBE = 'Wardrobe';
    public const DRAWERS = 'Drawers';
    public const AIR_CONDITIONER = 'Air conditioner';
    public const HEATER = 'Heater';
    public const DESK = 'Desk';
    public const LAMP = 'Lamp';
    public const CHAIR = 'Chair';
    public const COUCH = 'Couch';
    public const TV = 'TV';
    public const BALCONY = 'Balcony';
    public const DOOR_LOCK = 'Door lock';
    public const KITCHENETTE = 'Kitchenette';

    // Accepting Options
    public const BACKPACKERS = 'Backpackers';
    public const STUDENTS = 'Students';
    public const SMOKERS = 'Smokers';
    public const LGBTQIA = 'LGBTQIA+';
    public const SENIORS = '40+ years olds';
    public const CHILDREN = 'Children';
    public const PETS = 'Pets';
    public const RETIREES = 'Retirees';
    public const ONWELFARE = 'On welfare';


    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }
    public function property()
    {
        return $this->belongsTo(Property::class,'property_id','id');
    }

    // Return Furnish Features as an associative array
    public static function getFurnishFeatures(): array
    {
        return [
            self::BED_SIDE_TABLE => 'Bed side table',
            self::WARDROBE => 'Wardrobe',
            self::DRAWERS => 'Drawers',
            self::AIR_CONDITIONER => 'Air conditioner',
            self::HEATER => 'Heater',
            self::DESK => 'Desk',
            self::LAMP => 'Lamp',
            self::CHAIR => 'Chair',
            self::COUCH => 'Couch',
            self::TV => 'TV',
            self::BALCONY => 'Balcony',
            self::DOOR_LOCK => 'Door lock',
            self::KITCHENETTE => 'Kitchenette',
        ];
    }

    public static function getAcceptingOptions(): array
    {
        return [
            self::BACKPACKERS => 'Backpackers',
            self::STUDENTS => 'Students',
            self::SMOKERS => 'Smokers',
            self::LGBTQIA => 'LGBTQIA+',
            self::SENIORS => '40+ years olds',
            self::CHILDREN => 'Children',
            self::PETS => 'Pets',
            self::RETIREES => 'Retirees',
            self::ONWELFARE => 'On welfare',
        ];
    }
}
