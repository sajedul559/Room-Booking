<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'section',
        'route',
        'parent_route',
        'child_route',
        'is_active',
        'method_type'
    ];
    public function childRoutes()
    {
        return $this->hasMany(Permission::class, 'parent_route', 'route');
    }
}
