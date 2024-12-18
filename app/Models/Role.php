<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    /**
     * Relationship: Created By
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Relationship: Last Updated By
     */
    public function lastUpdatedBy()
    {
        return $this->belongsTo(User::class, 'last_updated_by');
    }
}
