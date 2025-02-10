<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id', 'name', 'phone', 'email', 'country',
        'subject', 'description', 'created_by'
    ];
}
