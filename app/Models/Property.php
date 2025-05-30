<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'property_name',
        'slug',
        'location',
        'city',
        'state',
        'property_type',
        'total_bedroom',
        'total_bathroom',
        'total_people_live',
        'parking',
        'internet',
        'accessibility',
        'image_path',
        'created_by',
        'last_updated_by',
        'vendor_id',
        'is_publish',
        'is_new',
        'is_delete',
        'nearby_places',
    ];

    protected $casts = [
        'nearby_places' => 'array',
    ];

     // Define property types as constants
     public const PROPERTY_TYPE_FLAT = 'Flat';
     public const PROPERTY_TYPE_STUDENT_ACCOMMODATION = 'Student Accommodation';
     public const PROPERTY_TYPE_HOMESTAY = 'Homestay';

     // Define Accessibility Features as constants
     public const ACCESSIBILITY_FEATURE_LIFT = 'Lift';
     public const ACCESSIBILITY_FEATURE_STEP_FREE_HOME = 'Step-free home';
     public const ACCESSIBILITY_FEATURE_LEVEL_ACCESS = 'Level access to home';
     public const ACCESSIBILITY_FEATURE_WIDER_DOORWAYS = 'Wider doorways';
     public const ACCESSIBILITY_FEATURE_ROOL_SHOWER = 'Roll-in shower';
     public const ACCESSIBILITY_FEATURE_BATHROOM_GRIP_RAILS = 'Bathroom grip rails';
 
     // Return property types as an associative array
     public static function getPropertyTypes(): array
     {
         return [
             self::PROPERTY_TYPE_FLAT => 'Flat',
             self::PROPERTY_TYPE_STUDENT_ACCOMMODATION => 'Student Accommodation',
             self::PROPERTY_TYPE_HOMESTAY => 'Homestay',
         ];
     }

      // Return Accessibility Features as an associative array
      public static function getAccessibilityFeatures(): array
      {
          return [
              self::ACCESSIBILITY_FEATURE_LIFT => 'Lift',
              self::ACCESSIBILITY_FEATURE_STEP_FREE_HOME => 'Step-free home',
              self::ACCESSIBILITY_FEATURE_LEVEL_ACCESS => 'Level access to home',
              self::ACCESSIBILITY_FEATURE_WIDER_DOORWAYS => 'Wider doorways',
              self::ACCESSIBILITY_FEATURE_ROOL_SHOWER => 'Roll-in shower',
              self::ACCESSIBILITY_FEATURE_BATHROOM_GRIP_RAILS => 'Bathroom grip rails',
          ];
      }

     public function vendor()
     {
        return $this->belongsTo(Vendor::class,'vendor_id','id');
     }
     public function createdBy()
     {
        return $this->belongsTo(user::class,'created_by','id');
     }
     public function updatedBy()
     {
        return $this->belongsTo(user::class,'last_updated_by','id');
     }
      public function reviews()
    {
        return $this->hasMany(RoomReview::class);
    }

    public function averageRating()
    {
        return number_format($this->reviews()->avg('star') ?? 0, 2);

    }
}
