<?php

namespace App\Models;

use App\Models\Traits\HasCreatedUpdatedBy;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UserRelationshipTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, UserRelationshipTrait, HasCreatedUpdatedBy;
    protected $fillable = [
        'name',
        'slug',
        'is_active',
        'is_system',
        'user_id',
        'created_by',
        'updated_by'
    ];
}
