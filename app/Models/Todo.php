<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id',
        'name',
        'description',
        'status',
        'due_date',
        'assigned_to',
        'created_by',
        'updated_by',
        'last_update_date',
    ];

    public const TODO_PENDING = 'Pending';
    public const TODO_DONE = 'Done';
    public const TODO_DUE = 'Due';

    // Return property types as an associative array
    public static function getTodoStatus(): array
    {
        return [
            self::TODO_PENDING => 'Pending',
            self::TODO_DONE => 'Done',
            self::TODO_DUE => 'Due',
        ];
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
