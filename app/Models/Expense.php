<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id',
        'date',
        'property_id',
        'created_by',
        'last_updated_by',
        'last_update_date',
        'expense_type',
        'amount',
        'is_credit',
    ];

    public const CLEANING_COST = 'Cleaning Cost';
    public const ELECTRICITY_BILL = 'Electricity Bill';
    public const WATER_BILL = 'Water Bill';


    // Return property types as an associative array
    public static function getExpenseTypes(): array
    {
        return [
            self::CLEANING_COST => 'Cleaning Cost',
            self::ELECTRICITY_BILL => 'Electricity Bill',
            self::WATER_BILL => 'Water Bill',
        ];
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function createdBy()
    {
       return $this->belongsTo(user::class,'created_by','id');
    }

}
