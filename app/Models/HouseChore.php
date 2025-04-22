<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseChore extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id',
        'property_id',
        'date',
        'expected_date_to_complete',
        'name',
        'description',
        'task_type',
        'comments',
        'cleaner_booked',
        'status',
        'created_by',
        'last_updated_by',
    ];

    public const STATUS_PENDING      = 'pending';
    public const STATUS_INPROGRESS   = 'in-progress';
    public const STATUS_CANCEL       = 'cancel';
    public const STATUS_COMPLETE     = 'Complete';

    public static function statusList(): array
    {
        return [
            self::STATUS_PENDING     => 'Pending',
            self::STATUS_INPROGRESS  => 'In-Progress',
            self::STATUS_CANCEL      => 'Cancel',
            self::STATUS_COMPLETE    => 'Complete',
        ];
    }

    public function property()
    {
        return $this->belongsTo(Property::class,'property_id','id');
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id','id');
    }
   
}
