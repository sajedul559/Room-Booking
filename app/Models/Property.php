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
        'image_path',
        'created_by',
        'last_updated_by',
        'vendor_id',
        'is_publish',
        'is_delete',
    ];

     // Define property types as constants
     public const PROPERTY_TYPE_FLAT = 'Flat';
     public const PROPERTY_TYPE_STUDENT_ACCOMMODATION = 'Student Accommodation';
     public const PROPERTY_TYPE_HOMESTAY = 'Homestay';
 
     // Return property types as an associative array
     public static function getPropertyTypes(): array
     {
         return [
             self::PROPERTY_TYPE_FLAT => 'Flat',
             self::PROPERTY_TYPE_STUDENT_ACCOMMODATION => 'Student Accommodation',
             self::PROPERTY_TYPE_HOMESTAY => 'Homestay',
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
}
